<?php

namespace App\Livewire\Employee\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Message;

class Inbox extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selectedMessage = null;

    public function render()
    {
        $messages = Message::inbox(auth()->guard('employee')->user())
                          ->with(['sender'])
                          ->latest()
                          ->paginate(10);

        return view('livewire.employee.messages.inbox', [
            'messages' => $messages
        ]);
    }

    public function markAsRead($messageId)
    {
        $message = Message::find($messageId);
        if ($message && $message->receiver_id === auth()->guard('employee')->id()) {
            $message->markAsRead();
            $this->dispatch('messageUpdated');
        }
    }

    public function showMessage($messageId)
    {
        $this->selectedMessage = Message::with('sender')->find($messageId);
        if ($this->selectedMessage && $this->selectedMessage->receiver_id === auth()->guard('employee')->user()->id) {
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
                'subject' => 'Re: ' . $this->selectedMessage->subject
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
        if ($message && $message->receiver_id === auth()->guard('employee')->id()) {
            $message->moveToTrash('receiver');
            session()->flash('success', 'Message moved to trash');
        }
    }
}
