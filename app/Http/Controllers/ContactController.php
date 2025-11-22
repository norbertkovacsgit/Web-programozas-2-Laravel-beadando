<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function form()
    {
        return view('contact.form');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:5',
        ]);

        Message::create($data);

        return redirect()
            ->route('contact.form')
            ->with('success', 'Üzenet sikeresen elküldve!');
    }
}
