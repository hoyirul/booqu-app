@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <a class="badge bg-label-primary me-1 float-end" href="/v1/memberships"
    ><i class="bx bx-arrow-back me-1"></i> Back to {{ $title }}</a
  >
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / {{ $title }} /</span> Edit</h4>

  <div class="row">
    <!-- Basic -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">

          <form action="/v1/memberships/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-password-toggle mb-3">
                <label for="name" class="form-label">Full Name</label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon11">#</span>
                  <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Full Name"
                    aria-label="Full Name"
                    aria-describedby="basic-addon11"
                    value="{{ $data->name }}"
                  />
                  @error('name')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
                </div>
              </div>

              <div class="form-password-toggle mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon11">#</span>
                  <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email Address"
                    aria-label="Email Address"
                    aria-describedby="basic-addon11"
                    value="{{ $data->email }}"
                  />
                  @error('email')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
                </div>
              </div>

              <div class="form-password-toggle mb-3">
                <div class="row">
                  <div class="col-md-4">
                    <label for="role_id" class="form-label">Role</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon11">#</span>
                      <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                        @foreach ($roles as $row)
                          <option value="{{ $row->id }}" {{ ($data->role_id == $row->id) ? 'selected' : '' }}>{{ $row->role_name }}</option>
                        @endforeach
                      </select>
                      @error('role_id')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="membership_id" class="form-label">Membership Package</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon11">#</span>
                      <select name="membership_id" id="membership_id" class="form-control @error('membership_id') is-invalid @enderror">
                        @foreach ($memberships as $row)
                          <option value="{{ $row->id }}" {{ ($data->membership_id == $row->id) ? 'selected' : '' }}>{{ $row->package }}</option>
                        @endforeach
                      </select>
                      @error('membership_id')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="is_active" class="form-label">Is Active</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon11">#</span>
                      <select name="is_active" id="is_active"
                        class="form-control @error('is_active') is-invalid @enderror"
                        placeholder="Number of Slide"
                        aria-label="Number of Slide">
                          <option value="active" {{ ($data->is_active == 'active') ? 'selected' : '' }}>Active</option>
                          <option value="inactive" {{ ($data->is_active == 'inactive') ? 'selected' : '' }}>Inactive</option>
                      </select>
                      @error('is_active')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
                    </div>
                  </div>
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
