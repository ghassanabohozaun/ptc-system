<?php

namespace App\Livewire\Employee\Messages;

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
        return redirect()->route('employees.messages.index', ['currentView' => $view]);
    }

    public function render()
    {
        return view('livewire.employee.messages.message-center');
    }
}
