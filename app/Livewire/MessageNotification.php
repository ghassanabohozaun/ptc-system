<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class MessageNotification extends Component
{
    public $unreadCount = 0;
    public $guard;
    public $iconClass;

    public function mount($guard = 'admin', $iconClass = 'fas fa-envelope')
    {
        $this->guard = $guard;
        $this->iconClass = $iconClass;
        $this->updateUnreadCount();
    }

    public function render()
    {
        /** @var \App\Models\Admin|\App\Models\Employee $user */
        $user = auth()->guard($this->guard)->user();

        // Recalculate unread count for real-time polling updates
        $this->unreadCount = $user ? $user->unreadMessagesCount() : 0;

        $latestMessages = $user ? $user->receivedMessages()
                                      ->where('is_read', false)
                                      ->where('receiver_deleted', false)
                                      ->latest()
                                      ->take(5)
                                      ->get() : collect();

        return view('livewire.message-notification', [
            'latestMessages' => $latestMessages
        ]);
    }

    #[On('messageUpdated')]
    #[On('message-sent')]
    public function updateUnreadCount()
    {
        /** @var \App\Models\Admin|\App\Models\Employee $user */
        $user = auth()->guard($this->guard)->user();
        $this->unreadCount = $user ? $user->unreadMessagesCount() : 0;
    }
}
