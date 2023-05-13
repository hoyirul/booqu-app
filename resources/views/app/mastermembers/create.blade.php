@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <a class="badge bg-label-primary me-1 float-end" href="/v1/mastermembers"
    ><i class="bx bx-arrow-back me-1"></i> Back to {{ $title }}</a
  >
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / {{ $title }} /</span> Add</h4>

  <div class="row">
    <!-- Basic -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">

          <form action="/v1/mastermembers" method="POST">
            @csrf
            <div class="form-password-toggle mb-3">
              <label for="package" class="form-label">Member Package</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="package"
                  class="form-control @error('package') is-invalid @enderror"
                  placeholder="Member Package"
                  aria-label="Member Package"
                  aria-describedby="basic-addon11"
                  value="{{ old('package') }}"
                />
                @error('package')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="description" class="form-label">Description</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="description"
                  class="form-control @error('description') is-invalid @enderror"
                  placeholder="Description"
                  aria-label="Description"
                  aria-describedby="basic-addon11"
                  value="{{ old('description') }}"
                />
                @error('description')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="price" class="form-label">price</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="number"
                  name="price"
                  class="form-control @error('price') is-invalid @enderror"
                  placeholder="price"
                  aria-label="price"
                  aria-describedby="basic-addon11"
                  value="{{ old('price') }}"
                />
                @error('price')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="max_device" class="form-label">Max Device</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="number"
                  name="max_device"
                  class="form-control @error('max_device') is-invalid @enderror"
                  placeholder="Max Device"
                  aria-label="Max Device"
                  aria-describedby="basic-addon11"
                  value="{{ old('max_device') }}"
                />
                @error('max_device')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
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
