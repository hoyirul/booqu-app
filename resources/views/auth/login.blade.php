@extends('layouts.main')

@section('content')
  <!-- component -->
  <div class="h-screen flex">
    <div class="invisible lg:visible flex w-0 md:w-0 lg:w-full bg-gradient-to-tr from-green-600 to-cyan-500 i justify-around items-center">
      <div>
        <img src="{{ asset('member/img/logo/light-logo.png') }}" alt="" class="w-80">
        <p class="text-white mt-1 mb-4">Temukan berbagai E-Book modul dan jurnal.</p>
        <a href="/" class="bg-white text-green-600 mt-4 py-2 px-4 rounded-lg font-bold border border-white mb-2 me-2 hover:bg-transparent hover:text-white">
          Read More
        </a>
        <a href="https://forms.gle/3Hk97f5gy9idBoAi6" class="bg-transparent text-white border border-white mt-4 py-2 px-4 rounded-lg font-bold mb-2 hover:bg-white hover:text-green-600">
          Join Now
        </a>
      </div>
    </div>
    <div class="flex items-center justify-center w-full lg:1/2 p-8">
      <div class="max-w-md w-full space-y-8">
        <div class="text-center">
          <h2 class="mt-6 text-3xl font-bold text-gray-900">
            Welcom Back!
          </h2>
          <p class="mt-2 text-sm text-gray-500">Please sign in to your account</p>
          @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline">{{ session('success') }}</span>
              <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
            </div>
          @endif
          @if(session('danger'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Errors!</strong>
              <span class="block sm:inline">{{ session('danger') }}</span>
              <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
            </div>
          @endif
        </div>
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
          @csrf
          <input type="hidden" name="remember" value="true">
          <div class="relative">
            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Email</label>
            <input
              class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500 @error('email') border border-red-500 rounded outline-none @enderror"
              type="email" placeholder="mail@gmail.com" name="email" value="{{ old('email') }}">
            @error('email')
              <span class="inline-flex text-sm text-red-600">{{ $message }}</span>
            @enderror
          </div>
          <div class="mt-8 content-center">
            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
              Password
            </label>
            <input
              class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500 @error('password') border border-red-500 rounded outline-none @enderror"
              type="password" placeholder="Enter your password" name="password">

            @error('password')
              <span class="inline-flex text-sm text-red-600">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember_me" name="remember_me" type="checkbox"
                class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
              <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                Remember me
              </label>
            </div>
            {{-- <div class="text-sm">
              <a href="#" class="text-sky-600 hover:text-sky-400">
                Forgot your password?
              </a>
            </div> --}}
          </div>
          <div>
            <button type="submit"
              class="w-full flex justify-center bg-gradient-to-r from-green-600 to-cyan-500  hover:bg-gradient-to-l hover:from-green-600 hover:to-cyan-500 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
              Sign in
            </button>
          </div>
        </form>
        <div class="visible lg:invisible flex">
          <a href="/" class="flex w-1/2 bg-green-600 text-white mt-4 py-2 px-4 rounded-lg font-bold border border-white mb-2 me-2 hover:bg-transparent hover:border-green-600 hover:text-green-600">
            Read More
          </a>
          <a href="https://forms.gle/3Hk97f5gy9idBoAi6" class="flex w-1/2 bg-transparent text-green-600 border border-green-600 mt-4 py-2 px-4 rounded-lg font-bold mb-2 me-2 hover:bg-green-600 hover:text-white">
            Join Now
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
