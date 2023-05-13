@extends('member.layouts.main')

@section('content')
<div class="bg-white shadow-lg rounded-lg mx-4 my-4">
  <!-- This is an example component -->

    <div id="default-carousel" class="relative" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-96 2xl:h-96">
        @foreach ($banners as $item)
          <div class="hidden duration-300 ease-in-out" data-carousel-item>
            <span
              class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
              Slide</span>
            <img src="{{ asset('storage/'.$item->banner_photo) }}"
              class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
          </div>
        @endforeach
      </div>
      <!-- Slider indicators -->
      <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
        @foreach ($banners as $item)
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="{{ 'Slide '.$item->numbers }}"
          data-carousel-slide-to="0"></button>
        @endforeach
      </div>
      <!-- Slider controls -->
      <button type="button"
        class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
          <span class="hidden">Previous</span>
        </span>
      </button>
      <button type="button"
        class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
          class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
          <span class="hidden">Next</span>
        </span>
      </button>
    </div>

</div>

<div class="mt-8 px-4 flex justify-between">
  <h1 class="text-gray-600 montserrat-semibold text-2xl">Buku Terbaru</h1>
  <a href="/book.html" class="w-48 py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
  </a>
</div>

<div class="grid grid-cols-8 gap-4 mt-2">

  @foreach ($books as $item)
    <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
      <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
        <div class="overflow-hidden mx-auto h-64 bg-gray-200 rounded-md">
          <img src="{{ asset('storage/'.$item->book_cover) }}" alt="">
        </div>
        <h3 class="mt-8 montserrat-semibold text-gray-600">{{ $item->title }}</h3>
        <p class="mt-2">{{ $item->author.' | '.$item->publisher }}</p>
        <div class="flex justify-center mt-4">
          <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <p class="ml-2 text-sm font-bold text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::rating($item->id) }}</p>
            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
            <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::reviews_from_rating($item->id) }} reviews</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach

</div>

<div class="mt-8 px-4 flex justify-between">
  <h1 class="text-gray-600 montserrat-semibold text-2xl">Buku Bisnis</h1>
  <a href="/book.html" class="w-48 py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
  </a>
</div>

<div class="grid grid-cols-8 gap-4 mt-2">

  @foreach ($descbooks as $item)
    <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
      <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
        <div class="overflow-hidden mx-auto h-64 bg-gray-200 rounded-md">
          <img src="{{ asset('storage/'.$item->book_cover) }}" alt="">
        </div>
        <h3 class="mt-8 montserrat-semibold text-gray-600">{{ $item->title }}</h3>
        <p class="mt-2">{{ $item->author.' | '.$item->publisher }}</p>
        <div class="flex justify-center mt-4">
          <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <p class="ml-2 text-sm font-bold text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::rating($item->id) }}</p>
            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
            <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::reviews_from_rating($item->id) }} reviews</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach

</div>

<div class="bg-white shadow-lg border border-gray-100 rounded-lg px-4 py-6 mx-4 my-4">
  <div class="h-40 bg-gray-400 w-40 mt-8 block mx-auto rounded-full"></div>
  <div class="h-2 bg-gray-300 w-96 mt-6 block mx-auto rounded-sm"></div>
  <div class="h-2 bg-gray-300 w-96 mt-1 block mx-auto rounded-sm"></div>
  <div class="h-4 bg-gray-400 w-80 mt-3 block mx-auto rounded-sm"></div>
</div>

<div class="mt-8 px-4 flex justify-between">
  <div class="py-4 bg-gray-400 w-40 rounded-md"></div>
  <a href="/reviews.html" class="w-48 py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
  </a>
</div>

<div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
  <div class="mx-auto h-80 bg-gray-200 rounded-md"></div>
</div>

<div class="grid grid-cols-6 gap-4 mt-2">

  <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-400 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-300 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-400 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-300 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-400 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-300 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
    </div>
  </div>

</div>

<div class="text-center max-w-lg mx-auto mt-8">
  <div class="h-4 bg-gray-400 w-80 block mx-auto rounded-sm"></div>
  <div class="h-2 bg-gray-300 w-80 mt-2 block mx-auto rounded-sm"></div>
</div>

<div class="grid grid-cols-6 gap-4 mt-2">

  <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
    </div>
  </div>
</div>

@endsection
