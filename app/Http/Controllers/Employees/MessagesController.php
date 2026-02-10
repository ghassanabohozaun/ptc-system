<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $title = __('messages.messages');

        return view('employees.messages.index', compact('title'));
    }
}
