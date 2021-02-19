@extends('layouts.app')

@section('content')

    

    <div class="justify-center flex ">
        <div class="w-6/12">
            <div class="p-6">
                <h1 class="text-2xl font-meduim mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }} </p>
            </div>
        <div class="bg-white p-6 rounded-lg">

           
        @if($posts->count())
                @foreach($posts as $post)
                    <div class="mb-4">
                        <a href="{{ route('user.posts',$post->user)  }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="mb-2">{{ $post->body }}</p>

                    <!-- //if($post->ownedBy(auth()->user())) -->

                    @can('delete', $post)
                    <div>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="text-blue-500" value="Delete">
                        </form>
                    </div>
                    @endcan
                    <!-- //endif -->
                    <div class="flex items-center">
                    @auth
                    @if(!$post->likedBy(auth()->user()))
                        <form action="{{ route('like', $post)}}" method="post" class="mr-1">
                        @csrf
                            <!-- <button type="submit"  class="text-blue-500">Like</button> -->
                            <input type="submit" class="text-blue-500" value="Like">
                        </form>
                    @else
                        <form action="{{ route('destroy',$post) }}" method="post" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <!-- <button type="submit"  class="text-blue-500">Unlike</button> -->
                            <input type="submit" class="text-blue-500" value="Unlike">
                        </form>
                    @endif
                    @endauth
                        <span> {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }} </span>
                    </div>


                @endforeach

                {{ $posts->links() }}
            @else
                <p>{{ $user->name }} dose not have any posts</p>
            @endif      
        </div>
    </div>

@endsection