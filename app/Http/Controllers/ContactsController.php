<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class ContactsController extends Controller
{
    public function get()
    {
        // get all users except the authenticated one
        $contacts = User::all();

        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        $messages = Message::where('from', $id)->orwhere('to', $id)->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        //broadcast(new NewMessage($message));
        return response()->json($message);
    }
}
