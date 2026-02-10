<?php

namespace App\Livewire\Dashboard\Messages;

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
        $messages = Message::starred(auth()->guard('admin')->user())
                          ->with(['sender', 'receiver'])
                          ->latest()
                          ->paginate(20);

        return view('livewire.dashboard.messages.starred', [
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
