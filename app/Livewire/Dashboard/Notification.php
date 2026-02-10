<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Notification extends Component
{
    public $notifications;
    public $unreadCount;

    public function mount()
    {
        $this->fetchNotifications();
    }

    public function fetchNotifications()
    {
        $user = auth()->user();
        if ($user) {
            $this->notifications = $user->unreadNotifications()->take(10)->get();
            $this->unreadCount = $user->unreadNotifications()->count();
        }
    }

    public function markAsRead($notificationId)
    {
        $user = auth()->user();
        $notification = $user->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
            $this->fetchNotifications();
            // Optional: You might want to emit an event or flash a message
        }
    }

    public function markAllAsRead()
    {
        $user = auth()->user();
        if ($user) {
            $user->unreadNotifications->markAsRead();
            $this->fetchNotifications();
        }
    }

    public function render()
    {
        // Refresh notifications on every render to support polling
        $this->fetchNotifications();
        return view('livewire.dashboard.notification');
    }
}
