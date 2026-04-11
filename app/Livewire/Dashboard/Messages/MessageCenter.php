<?php

namespace App\Livewire\Dashboard\Messages;

use Livewire\Component;
class MessageCenter extends Component
{
    public $currentView = 'inbox'; // inbox, sent, starred, trash

    protected $queryString = ['currentView'];

    public function mount()
    {
        if (!in_array($this->currentView, ['inbox', 'sent', 'starred', 'trash'])) {
            $this->currentView = 'inbox';
        }
    }

    public function setView($view)
    {
        return redirect()->route('dashboard.messages.index', ['currentView' => $view]);
    }

    public function render()
    {
        $user = auth()->user();
        $counts = [
            'inbox' => \App\Models\Message::inbox($user)->count(),
            'sent' => \App\Models\Message::sent($user)->count(),
            'starred' => \App\Models\Message::starred($user)->count(),
            'trash' => \App\Models\Message::trash($user)->count(),
        ];

        return view('livewire.dashboard.messages.message-center', compact('counts'));
    }
}
