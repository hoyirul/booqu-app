@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / </span> {{ $title }}</h4>

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

  <div class="row">
    <!-- Basic -->
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }} Password</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
          
          <form action="/settings/update_password" method="POST">
            @csrf
            @method('PUT')
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

            {{-- <div class="form-password-toggle mb-3">
              <label for="old_password" class="form-label">Old Password</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="password"
                  name="old_password"
                  class="form-control @error('old_password') is-invalid @enderror"
                  placeholder="Old Password"
                  aria-label="Old Password"
                  aria-describedby="basic-addon11"
                />
                @error('old_password')<div class="invalid-feedback ml-1">Field is required!</div>@enderror
              </div>
            </div> --}}

            <div class="form-password-toggle mb-3">
              <label for="password" class="form-label">New Password</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="password"
                  name="password"
                  class="form-control @error('password') is-invalid @enderror"
                  placeholder="New Password"
                  aria-label="New Password"
                  aria-describedby="basic-addon11"
                />
                @error('password')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>

            <div class="form-password-toggle mb-3">
              <label for="password_confirmation" class="form-label">Password Confirmation</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="password"
                  name="password_confirmation"
                  class="form-control @error('password_confirmation') is-invalid @enderror"
                  placeholder="Password Confirmation"
                  aria-label="Password Confirmation"
                  aria-describedby="basic-addon11"
                />
                @error('password_confirmation')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
          
            <button type="submit" class="btn btn-primary">Update Password</button>
          </form>
        
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }} Printer</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
          
          <form action="/settings/update_printer" method="POST">
            @csrf
            @method('PUT')
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
              <label for="printer" class="form-label">Printer</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
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
          
            <button type="submit" class="btn btn-primary">Update Printer</button>
          </form>
        
        </div>
      </div>
    </div>

  </div>
</div>
@endsection