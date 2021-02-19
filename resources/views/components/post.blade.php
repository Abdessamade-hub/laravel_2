@props(['post' => $post])



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