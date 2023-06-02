@extends('member.layouts.main')

@section('content')
  {{-- START BANNER/SLIDER | SECTION --}}
  <div class="overflow-hidden bg-white shadow-lg rounded-lg mx-4 my-4">
    <div id="default-carousel" class="relative" data-carousel="static">
      <!-- Carousel wrapper -->
      {{-- sm:h-64 xl:h-96 2xl:h-96 --}}
      <div class="overflow-hidden relative h-32 sm:h-64 md:h-[24rem] lg:h-[28rem] xl:h-[36rem] 2xl:h-[44rem]">
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
  {{-- END BANNER/SLIDER | SECTION --}}

  {{-- START LIST BOOKS | SECTION 1 --}}
  <div class="mt-8 px-4 flex justify-between">
    <h1 class="text-gray-600 montserrat-semibold text-2xl">Buku Terbaru</h1>
    <a href="/m1/books" class="w-48 py-6 sm:py-2 md:py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
    </a>
  </div>

  @if ($books->count() > 0)
    <div class="grid grid-cols-8 gap-4 mt-2">
      @foreach ($books as $item)
        <div class="col-span-8 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
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
    <p class="text-center mt-6">There is no book list!</p>
  @endif
  {{-- END LIST BOOKS | SECTION 1 --}}

  {{-- START LIST BOOKS | SECTION 2 --}}
  <div class="mt-8 px-4 flex justify-between">
    <h1 class="text-gray-600 montserrat-semibold text-2xl">Buku Bisnis</h1>
    <a href="/m1/books" class="w-48 py-6 sm:py-2 md:py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
    </a>
  </div>

  @if ($descbooks->count() > 0)
    <div class="grid grid-cols-8 gap-4 mt-2">
      @foreach ($descbooks as $item)
        <div class="col-span-8 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
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
    <p class="text-center mt-6">There is no book list!</p>
  @endif
  {{-- END LIST BOOKS | SECTION 2 --}}

  {{-- START BANNER --}}
  <div class="bg-gradient-to-tr from-cyan-500 to-green-400 shadow-lg border border-gray-100 rounded-lg px-4 py-6 mx-4 my-4">
    <div class="overflow-hidden h-40 bg-[#dfe0d1] w-40 mt-8 block mx-auto rounded-full">
      <img src="{{ asset('member/img/section/dedie.jpeg') }}" alt="">
    </div>
    <p class="text-white px-6 sm:px-6 md:px-10 lg:px-24 xl:px-36 2xl:48 mt-4">
      "Jangan pernah berharap jalan hidupmu akan seperti orang yang lain. Perjalanan hidupmu adalah sesuatu yang unik seperti dirimu. Buku adalah cara unik manusia untuk memandang dunia. Buku menjelajahi semua bagian kehidupan, mengubah kehidupan, dan memungkinkan untuk melihat berbagai hal secara berbeda. Buku dapat mengubah hidupmu."
    </p>
    <h3 class="text-white montserrat-bold mt-4">Dediek Tri Kurniawan - Booqu.id</h3>
  </div>
  {{-- END BANNER --}}

  {{-- START LIST BOOK REVIEWS | SECTION --}}
  <div class="mt-8 px-4 flex justify-between">
    <h1 class="text-gray-600 montserrat-semibold text-2xl">Review Buku</h1>
    <a href="/m1/books/reviews" class="w-48 py-6 sm:py-2 md:py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
    </a>
  </div>

  @if ($bookreviews->count() > 0)
    <div class="px-4 py-6">
      <div class="overflow-hidden bg-white h-[36rem] shadow-lg rounded-lg">
        <iframe src="https://www.youtube.com/embed/{{ $descbookreviews->embeded_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" class="top-0 left-0 w-full h-full" allowfullscreen></iframe>
      </div>
    </div>

    <div class="grid grid-cols-6 gap-4 mt-2">
      @foreach ($bookreviews as $item)
        <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
          <div class="px-4 py-6">
            <div class="overflow-hidden bg-white shadow-lg rounded-lg h-[16rem]">
              <iframe src="https://www.youtube.com/embed/{{ $item->embeded_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" class="top-0 left-0 w-full h-full" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="flex justify-center">
      <img src="{{ asset('member/svg/search-not-found.svg') }}" class="mt-6 h-36"/>
    </div>
    <p class="text-center mt-6">There is no book list!</p>
  @endif
  {{-- END LIST BOOK REVIEWS | SECTION --}}
@endsection
