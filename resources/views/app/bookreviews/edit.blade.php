@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <a class="badge bg-label-primary me-1 float-end" href="/v1/bookreviews"
    ><i class="bx bx-arrow-back me-1"></i> Back to {{ $title }}</a
  >
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / {{ $title }} /</span> Edit</h4>

  <div class="row">
    <!-- Basic -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">

          <form action="/v1/bookreviews/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-password-toggle mb-3">
              <label for="title" class="form-label">Title of Book Reviews</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="title"
                  class="form-control @error('title') is-invalid @enderror"
                  placeholder="Title of Book Reviews"
                  aria-label="Title of Book Reviews"
                  aria-describedby="basic-addon11"
                  value="{{ $data->title }}"
                />
                @error('title')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="author" class="form-label">Author of Book Reviews</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="author"
                  class="form-control @error('author') is-invalid @enderror"
                  placeholder="Author of Book Reviews"
                  aria-label="Author of Book Reviews"
                  aria-describedby="basic-addon11"
                  value="{{ $data->author }}"
                />
                @error('author')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="embeded_link" class="form-label">Embeded Link</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">https://www.youtube.com/embed/</span>
                <input
                  type="text"
                  name="embeded_link"
                  class="form-control @error('embeded_link') is-invalid @enderror"
                  placeholder="Embeded Link"
                  aria-label="Embeded Link"
                  aria-describedby="basic-addon11"
                  value="{{ $data->embeded_link }}"
                />
                @error('embeded_link')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
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
