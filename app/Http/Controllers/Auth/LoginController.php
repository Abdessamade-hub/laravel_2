<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    function __construct()
    {
        $this->middleware(['guest']);
    }
    function index()
    {
        return view('Auth.login');
    }

    function store(Request $request)
    {
        // dd($request->remember);
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required'
        ]
        );

        if(!auth()->attempt($request->only('email','password'), $request->remember))
        {
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');

    }
}
