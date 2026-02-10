<?php

namespace App\Livewire\Employee\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Message;

class Starred extends Component
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
        $messages = Message::starred(auth()->guard('employee')->user())
                          ->with(['sender', 'receiver'])
                          ->latest()
                          ->paginate(10);

        return view('livewire.employee.messages.starred', [
            'messages' => $messages
        ]);
    }

    public function toggleStar($messageId)
    {
        $message = Message::find($messageId);
        if ($message) {
            $message->toggleStar();
        }
    }
}
