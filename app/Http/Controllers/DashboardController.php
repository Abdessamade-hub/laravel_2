<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class DashboardController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth']);
    }

    function index()
    {

        

        // dd(auth()->user());
        // dd(auth()->user()->posts);
        return view('dashboard');
    }
}
