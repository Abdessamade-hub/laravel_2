<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('index');

        // $this->middleware(['auth'])->only(['store', 'destroy']);
    } 


    public function index()
    {

        //with(['user', 'likes'])-> les requetes 
        //orderBy('created_at', 'desc') = latest()
        
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        // $posts = Post::get();
        return view('posts.index',
           [
               'posts' => $posts
           ]
        );
    }


    public function show(Post $post)
    {
            return view('posts.show',
                [
                    'post'=>$post,
                ]
            );
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'body'=>'required'
            ]
            );

        $request->user()->posts()->create($request->only('body'));
        
        return back();
    }
    public function destroy(Post $post)
    {   
        // if(!$post->ownedBy(auth()->user()))
        // {
        //      dd('no you can\'t');
        // }

        $this->authorize('delete', $post);

        $post->delete();
        
        return back();
    }
}
