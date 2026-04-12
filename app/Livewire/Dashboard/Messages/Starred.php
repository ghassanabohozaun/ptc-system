<?php

namespace App\Livewire\Dashboard\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Message;
use Livewire\Attributes\On;

class Starred extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selectedMessages = [];
    public $selectAll = false;
    public $selectedMessage = null;

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedMessages = Message::starred(auth()->guard('admin')->user())
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
            $message->moveToTrash('receiver');
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
