@extends('layouts.app')

@section('content')

    
    <div class="justify-center flex">
    
        <div class="w-6/12 bg-white p-6 rounded-lg">
       
        @guest
             <div class="text-right mb-2">
                    <a href="{{ route('login') }}" class="text-red-400 ">You are not Logined</a>
            </div>
        @endguest

        @auth
            <form action="{{ route('posts') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 ">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="text-right mr-4">
                <input type="submit" value="Post" class="bg-blue-500 text-white px-8 py-2 rounded-lg font-meduim">
            </div>
            </form>
            @endauth

            @if($posts->count())
                @foreach($posts as $post)
                    {{-- <div class="mb-4">
                        <a href="{{ route('user.posts',$post->user)  }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div> --}}
                    {{-- <p class="mb-2">{{ $post->body }}</p> --}}

                    <!-- //if($post->ownedBy(auth()->user())) -->
{{-- 
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
                    </div> --}}



                    <figure class="md:flex bg-gray-100 rounded-xl p-4 md:p-0 mb-6">
                        <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="http://assets.stickpng.com/images/585e4bcdcb11b227491c3396.png" alt="" width="" height="">
                        <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                            <figcaption class="font-medium flex justify-between">
                                <div class="text-blue-500">
                                        <a href="{{ route('user.posts',$post->user)  }}" >{{ $post->user->name }}</a> 
                                </div>
                                <div class="text-gray-500">
                                            {{ $post->created_at->diffForHumans() }}
                                </div>
                              </figcaption>
                            <blockquote>
                            <p class="font-semibold">
                              “{{ $post->body }}”
                            </p>
                          </blockquote>

                          <blockquote class="justify-between flex">
                            @can('delete', $post)
                            <div>
                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="text-right">
                                        <div class="">
                                            <input type="submit" class="text-white bg-red-400 p-2 rounded-lg" value="Delete">
                                        </div>
                                    </div>
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
                                <span> {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                                
                            </div>
                          </blockquote>
                         
                        </div>
                      </figure>




                @endforeach

                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif

        </div>
    </div>

@endsection