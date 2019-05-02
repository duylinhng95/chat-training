<?php

namespace App\Http\Controllers;

use App\Entities\Message;
use Illuminate\Http\Request;
use App\Entities\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '!=' , Auth::id())->get();
        return view('home', compact('users'));
    }

    public function sendMessage($id)
    {
        $sender = Auth::user();
        $receiver = User::where('id', $id)->first();
        $messages = Message::where('sender_id', $sender->id)->where('receiver_id', $receiver->id)->get();
        return view('chat', compact('messages'));
    }
}
