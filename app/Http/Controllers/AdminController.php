<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Result;

class AdminController extends Controller
{
    public function index()
    {
        $userCount    = User::count();
        $messageCount = Message::count();
        $raceCount    = Result::count();

        return view('admin.index', compact('userCount', 'messageCount', 'raceCount'));
    }
}
