<?php

namespace App\Livewire\Employee\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Message;

class Trash extends Component
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
        $messages = Message::trash(auth()->guard('employee')->user())
                          ->with(['sender', 'receiver'])
                          ->latest()
                          ->paginate(10);

        return view('livewire.employee.messages.trash', [
            'messages' => $messages
        ]);
    }

    public function restore($messageId)
    {
        $message = Message::find($messageId);
        if ($message) {
            $user = auth()->guard('employee')->user();
            if ($message->sender_id === $user->id && $message->sender_type === get_class($user)) {
                $message->restoreFromTrash('sender');
            } else {
                $message->restoreFromTrash('receiver');
            }
            session()->flash('success', 'Message restored');
        }
    }

    public function confirmPermanentDelete($messageId)
    {
        $this->dispatch('confirm-delete', id: $messageId, type: 'permanent');
    }

    #[On('doDelete')]
    public function doPermanentDelete($messageId)
    {
        $message = Message::find($messageId);
        if ($message) {
            $message->forceDelete();
            session()->flash('success', 'Message permanently deleted');
        }
    }
}
