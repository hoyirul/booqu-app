<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booqu | Sandbox</title>
  <link rel="stylesheet" href="{{ asset('member/css/main.css') }}">
</head>

<body>

  @include('member.partials.navbar')

  <main class="container mx-auto px-5 flex items-center justify-between">
    <div class="px-4 py-2 text-center w-full">

      @yield('content')

      @include('member.partials.footer')
    </div>
  </main>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</body>

</html>
