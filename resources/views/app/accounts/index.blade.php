@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / </span> {{ $title }}</h4>

  <div class="row">
    <!-- Basic -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
          
          <form action="#" method="POST">
            <div class="form-password-toggle mb-3">
              <label for="name" class="form-label">Name</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  readonly
                  type="text"
                  name="name"
                  class="form-control @error('name') is-invalid @enderror"
                  placeholder="Name"
                  aria-label="Name"
                  aria-describedby="basic-addon11"
                  value="{{ $data->name }}"
                />
                @error('name')<div class="invalid-feedback ml-1">Field is required!</div>@enderror
              </div>
            </div>

            <div class="form-password-toggle mb-3">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  readonly
                  type="text"
                  name="email"
                  class="form-control @error('email') is-invalid @enderror"
                  placeholder="Email"
                  aria-label="Email"
                  aria-describedby="basic-addon11"
                  value="{{ $data->email }}"
                />
                @error('email')<div class="invalid-feedback ml-1">Field is required!</div>@enderror
              </div>
            </div>

            <div class="form-password-toggle mb-3">
              <label for="printer" class="form-label">Printer</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  readonly
                  type="text"
                  name="printer"
                  class="form-control @error('printer') is-invalid @enderror"
                  placeholder="Printer"
                  aria-label="Printer"
                  aria-describedby="basic-addon11"
                  value="{{ $data->printer }}"
                />
                @error('printer')<div class="invalid-feedback ml-1">Field is required!</div>@enderror
              </div>
            </div>
          
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
          </form>
        
        </div>
      </div>
    </div>
  </div>
</div>
@endsection