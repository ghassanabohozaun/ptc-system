<?php

namespace App\Livewire\Dashboard\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Message;

class Trash extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selectedMessages = [];
    public $selectAll = false;
    public $selectedMessage = null;

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedMessages = Message::trash(auth()->guard('admin')->user())
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
            $message->forceDelete();
        });

        $this->selectedMessages = [];
        session()->flash('success', 'Selected messages permanently deleted');
    }

    public function confirmBulkRestore()
    {
        if (empty($this->selectedMessages)) {
            return;
        }
        $this->dispatch('confirm-restore-bulk');
    }

    #[On('doBulkRestore')]
    public function doBulkRestore()
    {
        $user = auth()->guard('admin')->user();
        Message::whereIn('id', $this->selectedMessages)->each(function ($message) use ($user) {
            if ($message->sender_id === $user->id && $message->sender_type === get_class($user)) {
                $message->restoreFromTrash('sender');
            } else {
                $message->restoreFromTrash('receiver');
            }
        });

        $this->selectedMessages = [];
        session()->flash('success', 'Selected messages restored');
    }

    public function showMessage($messageId)
    {
        $this->selectedMessage = Message::with(['sender', 'receiver'])->find($messageId);
        $this->dispatch('open-message-modal');
    }

    public function render()
    {
        $messages = Message::trash(auth()->guard('admin')->user())
                          ->with(['sender', 'receiver'])
                          ->latest()
                          ->paginate(20);

        return view('livewire.dashboard.messages.trash', [
            'messages' => $messages
        ]);
    }

    public function restore($messageId)
    {
        $message = Message::find($messageId);
        if ($message) {
            $user = auth()->guard('admin')->user();
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
