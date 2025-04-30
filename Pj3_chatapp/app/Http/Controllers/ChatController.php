<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('dashboard', compact('users'));
    }
    function fetchMessage(Request $request)
    {
        $contact = User::findOrFail($request->contact_id);

        $messages = Message::where('form_id', Auth::user()->id) //lấy tin nhắn của mình
            ->where('to_id', $request->contact_id)             //lấy tin nhắn của đối phương
            ->orWhere('form_id', $request->contact_id)->where('to_id', Auth::user()->id) // nêu tin nhắn của đối phương đã gửi cho mình và ngược lại
            ->get();

        return response()->json([
            'contact' => $contact,
            'messages' => $messages,
        ]);
    }
    function sendMessage(Request $request)
    {

        $request->validate([
            'message' => 'required',
            'contact_id' => 'required|string',
        ]);

        $messange = new Message();
        $messange->form_id = Auth::user()->id;
        $messange->to_id = $request->contact_id;
        $messange->message = $request->message;
        $messange->save();

        event(new SendMessageEvent($messange->message,Auth::user()->id, $request->contact_id));
        return response($messange);


        // return response()->json([
        //     'message' => $request->message,
        //     'contact_id' => $request->contact_id,
        // ]);
    }
}
