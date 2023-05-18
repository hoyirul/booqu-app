@extends('member.layouts.main')

@section('content')
  <!-- component -->
  <div class="w-full py-4 px-8 bg-white shadow-lg rounded-lg my-20">
    <div class="flex justify-center md:justify-end -mt-16">
        <img class="w-20 h-20 object-cover shadow-sm rounded-full border-2 border-indigo-500" src="{{ asset('storage/'.$books->book_cover) }}">
    </div>
    <div class="mt-4 sm:mt-2 md:-mt-10">
      <h2 class="text-gray-800 text-3xl font-semibold text-start me-10 montserrat-semibold">{{ $books->title }} | {{ $books->category->category }}</h2>
      <p class="text-start mt-2 text-gray-400">{{ $books->author }} | {{ $books->publisher }} | {{ $books->created_at }}</p>
      <iframe class="w-full aspect-square h-[28rem] sm:h-[36rem] md:h-1/2 mt-6" src="{{ $books->embeded_link }}"></iframe>
    </div>
  </div>
@endsection
