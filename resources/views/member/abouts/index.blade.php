@extends('member.layouts.main')

@section('content')
  <!-- component -->
  <div class="py-16 bg-white">
    <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
        <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
          <div class="md:5/12 lg:w-5/12">
            <img src="{{ asset('member/img/section/about.png') }}" alt="image" loading="lazy" width="" height="">
          </div>
          <div class="md:7/12 lg:w-6/12">
            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Termukan berbagai E-Book, Modul dan Jurnal Hanya di Booqu.id</h2>
            <p class="mt-6 text-gray-600">Booqu.id merupakan situs digital book yang dapat diakses oleh siapa saja yang tergabung dalam member kami. Dalam aktivitas bisnis, Booqu.id juga berkomitmen meningkatkan apresiasi dan penghargaan yang layak kepada para penulis yang merupakan mitra bisnis. Produk dan layanan kami fokus pada nilai edukasi yang merupakan bagian dari komitmen kami dalam membangun SDM yang berkualitas. Kami fokus pada keberlanjutan bisnis dan berkontribusi dalam pembangunan SDM jangka panjang.</p>
            <p class="mt-4 text-gray-600"> Kami berdiri dari kolaborasi PT Heidigi Inovasi Nusantara, CV Melijo Indonesia, dan Laboratorium Manajemen Universitas Negeri Malang.</p>
          </div>
        </div>
    </div>
  </div>

@endsection
