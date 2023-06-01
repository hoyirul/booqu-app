@extends('member.layouts.main')

@section('content')
  <!-- component -->
  <div class="absolute flex justify-between mt-6">
    <a href="/m1/books" class="invisible md:visible bg-green-600 absolute montserrat-medium py-2 px-10 rounded-md text-white text-md">
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
        @if ($ratings != null)
          <a href="#" class="text-green-600 montserrat-medium me-6"> <span class="fa fa-comment"></span> Telah Direview</a>
        @else
          <div id="basicModal" x-data="{ open: false }" @open-me="open=false" @close-me="open=false">
            <a  href="#"
              class="float-right text-green-600 montserrat-medium"
              @click.prevent="open = true" aria-controls="basic-modal"> <span class="fa fa-comment"></span> Review</a>
            <div @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title"
              x-ref="dialog" aria-modal="true">

              <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-description="Background backdrop, show/hide based on modal state."
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

              <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                  <div x-show="open" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-description="Modal panel, show/hide based on modal state."
                    class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                    @click.away="open = false">
                    <form action="/m1/books/{{ $books->id }}/ratings" method="POST">
                      @csrf
                      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                          <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-green-600" x-description="Heroicon name: outline/exclamation"
                              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                              </path>
                            </svg>
                          </div>
                          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                              {{ $books->title }}
                            </h3>
                            <div class="mt-2 text-center">
                              <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                          class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                          @click="open = false">
                          Submit
                        </button>
                        <button type="button"
                          class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                          @click="open = false">
                          Cancel
                        </button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        @endif
      </p>
      <div class="flex items-center mt-2">
        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        <span class="ml-2 text-md font-bold text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::rating($books->id) }}</span>
        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
        <span class="text-md font-medium text-gray-900 dark:text-gray-500">{{ \App\Http\Controllers\Member\HomeController::reviews_from_rating($books->id) }} reviews</span>
      </div>
      <iframe class="w-full aspect-square h-[28rem] sm:h-[36rem] md:h-1/2 mt-4" src="{{ $books->embeded_link }}preview"></iframe>
    </div>
  </div>
@endsection
