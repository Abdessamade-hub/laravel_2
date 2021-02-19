<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostLiked;

class DashboardController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth']);
    }

    function index()
    {
        $user = auth()->user();

        Mail::to($user)->send(new PostLiked());

        // dd(auth()->user());
        // dd(auth()->user()->posts);
        return view('dashboard');
    }
}
