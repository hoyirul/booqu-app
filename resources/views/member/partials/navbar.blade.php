<nav class="shadow-md bg-white">
  <div class="container flex flex-wrap items-center justify-between mx-auto p-4 px-12">
    <a href="/" class="flex items-center">
        <img src="{{ asset('member/img/logo/dark-logo.png') }}" class="w-48" alt="Flowbite Logo" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="/about" class="block py-2 pl-3 pr-4 text-white bg-gray-700 rounded md:bg-transparent md:text-gray-700 md:p-0">Tentang Kami</a>
        </li>
        <li>
          <a href="https://docs.google.com/forms/d/e/1FAIpQLSdDWhUSKPHcXlZVDU-nkhncHL0hmY7Y8DlK3Ao8qDzYRPAvYg/viewform?usp=sf_link" target="_blank" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 md:p-0">Membership</a>
        </li>
        <li>
          @auth
            <a href="/m1/collections" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 md:p-0">Koleksi</a>
          @else
            <a href="/books" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 md:p-0">Buku</a>
          @endauth
        </li>
        <li>
          @auth
            <a href="/m1/books/reviews" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 md:p-0">Review Buku</a>
          @else
            <a href="/books/reviews" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 md:p-0">Review Buku</a>
          @endauth
        </li>
        <li>
          @auth
            @if (Auth::user()->role_id == 1)
              <a href="/v1/home" class="py-2 px-8 -mt-2 bg-cyan-500 rounded-lg text-white montserrat-semibold hover:bg-cyan-500 transition-colors">
                Dashboard
              </a>
            @else
              <a href="/m1/settings" class="py-2 px-8 -mt-2 bg-cyan-500 rounded-lg text-white montserrat-semibold hover:bg-cyan-500 transition-colors">
                Pengaturan
              </a>
            @endif
          @else
            <a
              class="py-2 px-8 bg-green-600 rounded-lg text-white montserrat-semibold hover:bg-green-700 transition-colors"
              href="/login">Login</a>
          @endauth
        </li>
      </ul>
    </div>
  </div>
</nav>

