@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <a class="badge bg-label-primary me-1 float-end" href="/v1/banners"
    ><i class="bx bx-arrow-back me-1"></i> Back to {{ $title }}</a
  >
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / {{ $title }} /</span> Edit</h4>

  <div class="row">
    <!-- Basic -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">

          <form action="/v1/banners/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-password-toggle mb-3">
              <label for="numbers" class="form-label">Number of Slide</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="number"
                  name="numbers"
                  class="form-control @error('numbers') is-invalid @enderror"
                  placeholder="Number of Slide"
                  aria-label="Number of Slide"
                  aria-describedby="basic-addon11"
                  value="{{ $data->numbers }}"
                />
                @error('numbers')<div class="invalid-feedback ml-1">Field is required!</div>@enderror
              </div>
            </div>

            <div class="form-password-toggle mb-3">
              <label for="is_active" class="form-label">Is Active of Slide</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <select name="is_active" id="is_active"
                  class="form-control @error('is_active') is-invalid @enderror"
                  placeholder="Number of Slide"
                  aria-label="Number of Slide">
                    <option value="active" {{ ($data->is_active == 'active') ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ ($data->is_active == 'inactive') ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')<div class="invalid-feedback ml-1">Field is required!</div>@enderror
              </div>
            </div>

            <div class="form-password-toggle mb-3">
              <label for="banner_photo" class="form-label">File of Slide</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="file"
                  name="banner_photo"
                  id="banner_photo"
                  class="form-control @error('banner_photo') is-invalid @enderror"
                  placeholder="File of Slide"
                  aria-label="File of Slide"
                  aria-describedby="basic-addon11"
                  value="{{ old('banner_photo') }}"
                />
                @error('banner_photo')<div class="invalid-feedback ml-1">Field is required!</div>@enderror
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
