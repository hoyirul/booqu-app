@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  {{-- <a class="badge bg-label-primary me-1 float-end" href="/v1/roles/create"
    ><i class="bx bx-plus me-1"></i> Add Data</a
  > --}}
  <h4 class="fw-bold @if(!session('success') || !session('danger')) py-3 mb-4 @endif"><span class="text-muted fw-light">Master /</span> {{ $title }}</h4>

  <!-- Basic Bootstrap Table -->
  @if(session('success'))
    <div class="alert alert-info">
      {{session('success')}}
    </div>
  @endif
  @if(session('danger'))
    <div class="alert alert-danger">
      {{session('danger')}}
    </div>
  @endif

  <div class="card">
    <h5 class="card-header">{{ $title }}</h5>
    <div class="table-responsive text-nowrap container mb-4">
      <table id="table" class="table">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Book Title</th>
            <th>Views</th>
            <th>Datetime</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($data as $item)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->book->title }}</strong></td>
              <td>{{ $item->count_book }} Views</td>
              <td>{{ $item->book->updated_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

</div>
@endsection
