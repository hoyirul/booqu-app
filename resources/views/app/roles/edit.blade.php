@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <a class="badge bg-label-primary me-1 float-end" href="/v1/roles"
    ><i class="bx bx-arrow-back me-1"></i> Back to {{ $title }}</a
  >
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / {{ $title }} /</span> Edit</h4>

  <div class="row">
    <!-- Basic -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">

          <form action="/v1/roles/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-password-toggle mb-3">
              <label for="role_name" class="form-label">Role Name</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="role_name"
                  class="form-control @error('role_name') is-invalid @enderror"
                  placeholder="Role Name"
                  aria-label="Role Name"
                  aria-describedby="basic-addon11"
                  value="{{ $data->role_name }}"
                />
                @error('role_name')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
