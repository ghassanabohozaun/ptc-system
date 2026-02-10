<?php

namespace App\Livewire\Employee\Messages;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Message;

class Compose extends Component
{
    public $recipient;
    public $subject = '';
    public $body = '';

    protected $listeners = ['set-reply' => 'handleReply'];

    public function handleReply($data)
    {
        $this->recipient = $data['recipient_id'];
        $this->subject = $data['subject'];
    }

    protected $rules = [
        'recipient' => 'required|exists:admins,id',
        'subject' => 'required|min:3|max:255',
        'body' => 'required|min:10',
    ];

    public function render()
    {
        $admins = Admin::select('id', 'name', 'email')->get();
        // Assuming Admin model has 'name' which is translatable according to the model file I read.
        // Wait, Admin model has `public array $translatable = ['name'];`.
        // Admin::select fields might need to be careful with translatable fields.
        // It's safer to just getAll and let accessor handle it or select *
        // But for performance, maybe just all() is fine for admins (usually few).
        // I will use `Admin::all()` to be safe with translatable attributes.

        $admins = Admin::all();

        return view('livewire.employee.messages.compose', [
            'admins' => $admins
        ]);
    }

    public function sendMessage()
    {
        $this->validate();

        $employee = auth()->guard('employee')->user();
        $admin = Admin::find($this->recipient);

        Message::create([
            'sender_type' => get_class($employee),
            'sender_id' => $employee->id,
            'receiver_type' => get_class($admin),
            'receiver_id' => $admin->id,
            'subject' => $this->subject,
            'body' => $this->body,
        ]);

        session()->flash('success', 'Message sent successfully');

        $this->reset(['recipient', 'subject', 'body']);

        $this->dispatch('close-modal');
        $this->dispatch('message-sent');

        return redirect()->route('employees.messages.index', ['currentView' => 'sent']);
    }
}
