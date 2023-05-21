<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booqu | Termukan berbagai E-Book, Modul dan Jurnal Hanya di Booqu.id | 2023</title>
  <link rel="icon" type="image/png" href="{{ asset('member/img/logo/ico.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('member/css/main.css') }}">
  <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
</head>

<body>

  @include('member.partials.navbar')

  <main class="container mx-auto px-5 flex items-center justify-between">
    <div class="px-4 py-2 text-center w-full">

      @yield('content')

      @include('member.partials.colabs')
      @include('member.partials.footer')
    </div>
  </main>
  <script src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <script>
    function closeModal(id) {
      document.getElementById(id).dispatchEvent(new CustomEvent('close-me', { detail: {}}));
    }
    function openModal(id) {
      document.getElementById(id).dispatchEvent(new CustomEvent('open-me', { detail: {}}));
    }

    openModal('basicModal');
  </script>
</body>

</html>
