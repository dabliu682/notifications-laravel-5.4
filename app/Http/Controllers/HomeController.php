<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('home', compact('users'));
    }
    public function store(Request $request)
    {
        //validation
        $mensaje = Mensaje::create
        (
            [
                'sender_id' => auth()->id(),
                'recipient_id' => $request->recipient_id,
                'body' => $request->body,
            ]
        );

        return back()->with('flash','Tu mensaje fue enviado');
    }
}
