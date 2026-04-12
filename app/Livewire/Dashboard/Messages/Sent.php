<?php

namespace App\Livewire\Dashboard\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Message;

class Sent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selectedMessages = [];
    public $selectAll = false;
    public $selectedMessage = null;

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedMessages = Message::sent(auth()->guard('admin')->user())
                ->pluck('id')
                ->toArray();
        } else {
            $this->selectedMessages = [];
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
            $message->moveToTrash('sender');
        });

        $this->selectedMessages = [];
        session()->flash('success', 'Selected messages moved to trash');
    }

    public function showMessage($messageId)
    {
        $this->selectedMessage = Message::with(['sender', 'receiver'])->find($messageId);
        $this->dispatch('open-message-modal');
    }

    public function render()
    {
        $messages = Message::sent(auth()->guard('admin')->user())
                          ->with(['receiver'])
                          ->latest()
                          ->paginate(20);

        return view('livewire.dashboard.messages.sent', [
            'messages' => $messages
        ]);
    }

    public function toggleStar($messageId)
    {
        $message = Message::find($messageId);
        if ($message && $message->sender_id === auth()->guard('admin')->id()) {
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
        if ($message && $message->sender_id === auth()->guard('admin')->id()) {
            $message->moveToTrash('sender');
            session()->flash('success', 'Message moved to trash');
        }
    }
}
