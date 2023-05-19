@extends('member.layouts.main')

@section('content')
  <div class="px-4 py-2 text-center w-full">

    <div class="mt-8 px-4 flex justify-between">
      <h1 class="text-gray-600 montserrat-semibold text-2xl">List Semua Buku</h1>
      <div class="w-74">
        <form action="" method="GET">
          <input type="text"
            class="w-60 py-2 px-4 montserrat-medium border border-gray-200 rounded-lg text-gray-400 montserrat-medium text-sm"
            placeholder="Cari disini" name="key" value="{{ $key }}">
          <button type="submit"
            class="bg-gray-500 text-white py-2 px-4 text-sm rounded-lg text-gray-400 montserrat-medium">Cari</button>
        </form>
      </div>
    </div>

    @if ($books->count() > 0)
      <div class="grid grid-cols-8 gap-4 mt-2">
        @foreach ($books as $item)
          <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
            <a href="/m1/books/{{ $item->id }}/show">
              <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
                <div class="overflow-hidden mx-auto h-64 bg-gray-200 rounded-md">
                  <img src="{{ asset('storage/'.$item->book_cover) }}" alt="">
                </div>
                <h3 class="mt-8 montserrat-semibold text-gray-600">{{ $item->title }}</h3>
                <p class="mt-2">{{ $item->author.' | '.$item->publisher }}</p>
                <div class="flex justify-center mt-4">
                  <div class="flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span class="ml-2 text-sm font-bold text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::rating($item->id) }}</span>
                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                    <span class="text-sm font-medium text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::reviews_from_rating($item->id) }} reviews</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    @else
      <div class="flex justify-center">
        <img src="{{ asset('member/svg/search-not-found.svg') }}" class="mt-6 h-36"/>
      </div>
      <p class="text-center mt-6">Book with "{{ $key }}" title not found!</p>
    @endif

    <!-- component -->
    <div class="max-w-2xl mx-auto mt-4">
      {{ $books->links() }}
    </div>
  </div>
@endsection
