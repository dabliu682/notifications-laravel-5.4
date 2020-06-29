<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\Notifications\MessageSent;
use App\User;
use Illuminate\Http\Request;

class MensajesController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('home', compact('users'));
    }
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'body' => 'required',
                'recipient_id' => 'required|exists:users,id',
            ]
        );
        $mensaje = Mensaje::create
        (
            [
                'sender_id' => auth()->id(),
                'recipient_id' => $request->recipient_id,
                'body' => $request->body,
            ]
        );

        $recipient=User::find($request->recipient_id);
        $recipient->notify( new MessageSent($mensaje));

        return back()->with('flash','Tu mensaje fue enviado');
    }

    public function show($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        return view('messages.show', compact('mensaje'));
    }
}
