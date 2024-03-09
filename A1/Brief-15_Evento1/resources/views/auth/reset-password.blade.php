@extends('layouts.app')
@section('title', 'login')
@section('content')
<div class="h-screen my-auto flex flex-col items-center justify-center px-6  mx-auto  lg:py-0">
    <div class="w-full bg-white rounded-lg shadow white:border md:mt-0 sm:max-w-md xl:p-0 white:bg-gray-800 white:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl white:text-white">
                Reset Password
            </h1>
            @if(session('error'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{session('error')}}
                </div>

            @endif
            <form class="space-y-4 md:space-y-6" method="post" action="{{route('auth.reset_password_submit')}}">
                @csrf
                <input type="hidden" name="token" value="{{$token}}"/>
                <input type="hidden" name="email" value="{{$email}}"/>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Password</label>
                    <input   type="password" name="password" id="password"  placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 @error('password') border border-red-500 @enderror " >
                    @error('password')
                    <li class="text-red-600 mt-1  p-2 text-sm">
                        {{$message}}
                    </li>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 @error('password') border border-red-500 @enderror" >
                </div>

                <button type="submit" class="w-full text-white bg-gray-900 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-primary-600 white:hover:bg-primary-700 white:focus:ring-primary-800">Reset Password</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
