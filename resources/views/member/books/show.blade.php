@extends('member.layouts.main')

@section('content')
  <!-- component -->
  <div class="absolute flex justify-between mt-6">
    <a href="/m1/books" class="bg-green-600 absolute montserrat-medium py-2 px-10 rounded-md text-white text-md">
      Kembali
    </a>
  </div>
  <div class="w-full py-4 px-8 bg-white shadow-lg border border-gray-100 rounded-lg my-20">
    <div class="flex justify-center md:justify-end -mt-20">
      <img class="w-36 h-36 object-cover shadow-sm rounded-full border-2 border-green-500" src="{{ asset('storage/'.$books->book_cover) }}">
    </div>
    <div class="mt-4 sm:mt-2 md:-mt-10 lg:-mt-16">
      <h2 class="text-gray-800 text-3xl font-semibold text-start me-10 montserrat-semibold">{{ $books->title }} | {{ $books->category->category }}</h2>
      <p class="text-start mt-2 text-gray-400">Author<span class="me-4 text-cyan-600 montserrat-medium"> {{ $books->author }}</span>  Publisher<span class="text-cyan-600 montserrat-medium"> {{ $books->publisher }}</span></p>
      <p class="text-start mt-2 text-gray-400">
        @if ($collections != null)
          <a href="/m1/{{ $books->id }}/collections/{{ Auth::user()->id }}" class="text-green-600 montserrat-medium me-6"> <span class="fa fa-bookmark"></span> Delete</a>
        @else
          <a href="/m1/collections/{{ $books->id }}" class="text-green-600 montserrat-medium me-6"> <span class="fa fa-bookmark-o"></span> Simpan</a>
        @endif
        <a href="" class="text-green-600 montserrat-medium"> <span class="fa fa-comment"></span> Review</a>
      </p>
      <div class="flex items-center mt-2">
        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        <span class="ml-2 text-md font-bold text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::rating($books->id) }}</span>
        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
        <span class="text-md font-medium text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::reviews_from_rating($books->id) }} reviews</span>
      </div>
      <iframe class="w-full aspect-square h-[28rem] sm:h-[36rem] md:h-1/2 mt-4" src="{{ $books->embeded_link }}"></iframe>
    </div>
  </div>
@endsection
