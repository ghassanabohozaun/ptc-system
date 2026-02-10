<?php

namespace App\Livewire\Dashboard\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Message;

class Inbox extends Component
{
    use WithPagination;

    public $selectedMessages = [];
    public $selectedMessage = null;
    public $selectAll = false;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $messages = Message::inbox(auth()->guard('admin')->user())
            ->with(['sender'])
            ->latest()
            ->paginate(20);

        return view('livewire.dashboard.messages.inbox', [
            'messages' => $messages,
        ]);
    }

    public function markAsRead($messageId)
    {
        $message = Message::find($messageId);
        if ($message && $message->receiver_id === auth()->guard('admin')->id()) {
            $message->markAsRead();
            $this->dispatch('messageUpdated');
        }
    }

    public function showMessage($messageId)
    {
        $this->selectedMessage = Message::with('sender')->find($messageId);
        if ($this->selectedMessage && $this->selectedMessage->receiver_id === auth()->guard('admin')->user()->id) {
            $this->selectedMessage->markAsRead();
            $this->dispatch('messageUpdated');
        }
        $this->dispatch('open-message-modal');
    }

    public function reply()
    {
        if ($this->selectedMessage) {
            $this->dispatch('set-reply', [
                'recipient_id' => $this->selectedMessage->sender_id,
                'subject' => 'Re: ' . $this->selectedMessage->subject,
            ]);
            $this->dispatch('close-details-modal');
            $this->dispatch('open-compose-modal');
        }
    }

    public function toggleStar($messageId)
    {
        $message = Message::find($messageId);
        if ($message) {
            $message->toggleStar();
        }
    }

    public function confirmDelete($messageId)
    {
        $this->dispatch('confirm-delete', id: $messageId, type: 'single');
    }

    #[On('doDelete')]
    public function doDelete($messageId)
    {
        $message = Message::find($messageId);
        if ($message && $message->receiver_id === auth()->guard('admin')->id()) {
            $message->moveToTrash('receiver');
            session()->flash('success', 'Message moved to trash');
        }
    }

    public function confirmBulkDelete()
    {
        if (empty($this->selectedMessages)) {
            return;
        }
        $this->dispatch('confirm-delete', type: 'bulk');
    }

    #[On('doBulkDelete')]
    public function doBulkDelete()
    {
        Message::whereIn('id', $this->selectedMessages)->each(function ($message) {
            $message->moveToTrash('receiver');
        });

        $this->selectedMessages = [];
        session()->flash('success', 'Selected messages moved to trash');
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedMessages = Message::inbox(auth()->guard('admin')->user())
                ->pluck('id')
                ->toArray();
        } else {
            $this->selectedMessages = [];
        }
    }
}
