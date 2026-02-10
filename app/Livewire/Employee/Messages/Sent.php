<?php

namespace App\Livewire\Employee\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Message;

class Sent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selectedMessage = null;

    public function showMessage($messageId)
    {
        $this->selectedMessage = Message::with(['sender', 'receiver'])->find($messageId);
        $this->dispatch('open-message-modal');
    }

    public function render()
    {
        $messages = Message::sent(auth()->guard('employee')->user())
                          ->with(['receiver'])
                          ->latest()
                          ->paginate(10);

        return view('livewire.employee.messages.sent', [
            'messages' => $messages
        ]);
    }

    public function toggleStar($messageId)
    {
        $message = Message::find($messageId);
        if ($message && $message->sender_id === auth()->guard('employee')->id() && $message->sender_type === get_class(auth()->guard('employee')->user())) {
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
        if ($message && $message->sender_id === auth()->guard('employee')->id() && $message->sender_type === get_class(auth()->guard('employee')->user())) {
            $message->moveToTrash('sender');
            session()->flash('success', 'Message moved to trash');
        }
    }
}
