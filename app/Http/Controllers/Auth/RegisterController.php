<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;

class RegisterController extends Controller
{

    function __construct()
    {
        $this->middleware(['guest']);
    }
    function index()
    {
        
        return view('auth.register');
    }

    function store(Request $request)
    {
        // dd($request->email);   
        // dd($request->only('email','password'));
        
        // validate data
        $this->validate($request,
        [
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed'
        ]);

        //create user
        User::create([
            'name'       => $request->name,
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => hash::make($request->password)
        ]);

        //sign in 
        auth()->attempt($request->only('email','password'));

        //redirect
        return redirect()->route('dashboard');
    }
}
