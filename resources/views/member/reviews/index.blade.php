@extends('member.layouts.main')

@section('content')
  <div class="px-4 py-2 text-center w-full">

    <div class="mt-8 px-4 flex justify-between">
      <h1 class="text-gray-600 montserrat-semibold text-2xl">List Review Buku</h1>
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

    @if ($bookreviews->count() > 0)
      <div class="grid grid-cols-6 gap-4 mt-2">
        @foreach ($bookreviews as $item)
          <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
            <div class="px-4 py-6">
              <div class="overflow-hidden bg-white shadow-lg rounded-lg h-[16rem]">
                <iframe src="{{ $item->embeded_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" class="top-0 left-0 w-full h-full" allowfullscreen></iframe>
              </div>
            </div>
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
      {{ $bookreviews->links() }}
    </div>
  </div>
@endsection
