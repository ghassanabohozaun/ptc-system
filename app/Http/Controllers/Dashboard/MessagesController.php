<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //

    public function index()
    {
        $title = __('messages.messages');

        return view('dashboard.messages.index', compact('title'));
    }
}
