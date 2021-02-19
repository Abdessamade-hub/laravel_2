@extends('layouts.app')

@section('content')

    <div class="justify-center flex ">
        <div class="w-2/12 bg-white p-4 rounded-lg">

            @if(session('status'))
            <div class="text-white bg-red-500 p-4 rounded-lg mb-6 text-center text-lg">
                {{ session('status') }}
                </div>
            @endif
        
            <form action="{{ route('login') }}" method="POST" >
            @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mb-2 ">
                        {{ $message }}
                    </div>
                @enderror
                </div>
              

                
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Chooce password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                    @error('password')
                    <div class="text-red-500 mb-2 ">
                        {{ $message }}
                    </div>
                     @enderror
                </div>
                
                <div class="mb-4">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>
                </div>

                <div class="mb-4">
                    <input type="submit" name="" id="" placeholder="repeat password" class="bg-blue-500 text-white px-4 py-3 font-meduim rounded-lg w-full " value="Login">
                </div>
            </form>
        </div>
    </div>

@endsection