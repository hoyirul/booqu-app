@extends('member.layouts.main')

@section('content')
<div class="bg-white shadow-lg rounded-lg mx-4 my-4">
  <!-- This is an example component -->

    <div id="default-carousel" class="relative" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-96 2xl:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-300 ease-in-out" data-carousel-item>
          <span
            class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
            Slide</span>
          <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-300 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg"
            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-300 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg"
            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
      </div>
      <!-- Slider indicators -->
      <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
          data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
          data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
          data-carousel-slide-to="2"></button>
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
  <div class="py-4 bg-gray-400 w-40 rounded-md"></div>
  <a href="/book.html" class="w-48 py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
  </a>
</div>

<div class="grid grid-cols-8 gap-4 mt-2">

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

</div>

<div class="mt-8 px-4 flex justify-between">
  <div class="py-4 bg-gray-400 w-40 rounded-md"></div>
  <a href="/book.html" class="w-48 py-2 bg-green-600 rounded-lg text-white montserrat-medium text-sm cursor-pointer">Lihat Semua
  </a>
</div>

<div class="grid grid-cols-8 gap-4 mt-2">

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

  <div class="col-span-6 sm:col-span-4 md:col-span-4 lg:col-span-2 xl:col-span-2">
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
      <div class="mx-auto h-40 bg-gray-200 rounded-md"></div>
      <div class="h-4 bg-gray-300 w-40 mt-8 block mx-auto rounded-sm"></div>
      <div class="h-2 bg-gray-200 w-64 md:w-20 sm:w-20 mt-2 block mx-auto rounded-sm"></div>
      <div class="flex justify-center mt-4">
        <div class="rounded-sm h-8 w-20 px-4 bg-gray-200 mr-2"></div>
        <div class="rounded-sm h-8 w-20 px-4 bg-green-400"></div>
      </div>
    </div>
  </div>

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
