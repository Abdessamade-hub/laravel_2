@extends('layouts.app')

@section('content')

    <div class="justify-center flex ">
        <div class="w-4/12 bg-white flex p-4 rounded-lg">
            <form action="{{ route('register') }}" method="POST" class="w-full">
            @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" >
                </div>
                 @error('name')
                        <div class="text-red-500 mb-2 ">
                            {{ $message }}
                        </div>
                 @enderror


                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                </div>
                @error('username')
                    <div class="text-red-500 mb-2 ">
                        {{ $message }}
                    </div>
                @enderror


                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="text-red-500 mb-2 ">
                        {{ $message }}
                    </div>
                @enderror

                
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Chooce password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                </div>
                @error('password')
                    <div class="text-red-500 mb-2 ">
                        {{ $message }}
                    </div>
                @enderror



                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="repeat password" class="bg-gray-100 border-2 w-full p-4 rounded-lg " value="">
                </div>

                <div class="mb-4">
                    <input type="submit" name="" id="password_confirmation" placeholder="repeat password" class="bg-blue-500 text-white px-4 py-3 font-meduim rounded-lg w-full " value="Register">
                </div>
            </form>
        </div>
    </div>

@endsection