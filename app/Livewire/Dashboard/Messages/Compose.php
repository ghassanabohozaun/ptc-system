<?php

namespace App\Livewire\Dashboard\Messages;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Message;

class Compose extends Component
{
    public $recipients = [];
    public $subject = '';
    public $body = '';
    public $sendToAll = false;
    public $search = '';

    protected $listeners = ['set-reply' => 'handleReply'];

    public function handleReply($data)
    {
        $this->recipients = [$data['recipient_id']];
        $this->subject = $data['subject'];
        $this->sendToAll = false;
    }

    public function toggleRecipient($id)
    {
        if ($this->sendToAll) return;
        
        if (in_array($id, $this->recipients)) {
            $this->recipients = array_diff($this->recipients, [$id]);
        } else {
            $this->recipients[] = $id;
        }
    }

    protected $rules = [
        'subject' => 'required|min:3|max:255',
        'body' => 'required|min:10',
    ];

    protected function rules()
    {
        $rules = [
            'subject' => 'required|min:3|max:255',
            'body' => 'required|min:10',
        ];

        if (!$this->sendToAll) {
            $rules['recipients'] = 'required|array|min:1';
        }

        return $rules;
    }

    public function render()
    {
        $employees = Employee::query()
            ->when($this->search, function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('family_name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->select('id', 'first_name', 'father_name', 'family_name', 'email')
            ->orderBy('first_name')
            ->get();
        // Updated to use the correct name fields from Employee model

        return view('livewire.dashboard.messages.compose', [
            'employees' => $employees
        ]);
    }

    public function sendMessage()
    {
        $this->validate();

        $admin = auth()->guard('admin')->user();

        if ($this->sendToAll) {
            $employees = Employee::all();
        } else {
            $employees = Employee::whereIn('id', $this->recipients)->get();
        }

        foreach ($employees as $employee) {
            Message::create([
                'sender_type' => get_class($admin),
                'sender_id' => $admin->id,
                'receiver_type' => get_class($employee),
                'receiver_id' => $employee->id,
                'subject' => $this->subject,
                'body' => $this->body,
            ]);
        }

        session()->flash('success', 'Message sent successfully to ' . $employees->count() . ' employee(s)');

        $this->reset(['recipients', 'subject', 'body', 'sendToAll', 'search']);

        $this->dispatch('close-modal');
        $this->dispatch('message-sent');

        return redirect()->route('dashboard.messages.index', ['currentView' => 'sent']);
    }

    public function updatedSendToAll($value)
    {
        if ($value) {
            $this->recipients = [];
        }
    }
}
