@extends('app.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <a class="badge bg-label-primary me-1 float-end" href="/v1/books"
    ><i class="bx bx-arrow-back me-1"></i> Back to {{ $title }}</a
  >
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / {{ $title }} /</span> Edit</h4>

  <div class="row">
    <!-- Basic -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">

          <form action="/v1/books/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-password-toggle mb-3">
              <label for="category_id" class="form-label">Category of Book</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                  @foreach ($categories as $row)
                    <option value="{{ $row->id }}" {{ ($data->category_id == $row->id) ? 'selected' : '' }}>{{ $row->category }}</option>
                  @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="title" class="form-label">Title of Book</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="title"
                  class="form-control @error('title') is-invalid @enderror"
                  placeholder="Title of Book"
                  aria-label="Title of Book"
                  aria-describedby="basic-addon11"
                  value="{{ $data->title }}"
                />
                @error('title')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="author" class="form-label">Author of Book</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="author"
                  class="form-control @error('author') is-invalid @enderror"
                  placeholder="Author of Book"
                  aria-label="Author of Book"
                  aria-describedby="basic-addon11"
                  value="{{ $data->author }}"
                />
                @error('author')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="publisher" class="form-label">Publisher</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="text"
                  name="publisher"
                  class="form-control @error('publisher') is-invalid @enderror"
                  placeholder="Publisher"
                  aria-label="Publisher"
                  aria-describedby="basic-addon11"
                  value="{{ $data->publisher }}"
                />
                @error('publisher')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-password-toggle mb-3">
              <label for="embeded_link" class="form-label">Embeded Link</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
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
            <div class="form-password-toggle mb-3">
              <label for="book_cover" class="form-label">Book Cover | <span class="text-danger">Max: 1 MB</span></label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11">#</span>
                <input
                  type="file"
                  name="book_cover"
                  class="form-control @error('book_cover') is-invalid @enderror"
                  placeholder="Book Cover"
                  aria-label="Book Cover"
                  aria-describedby="basic-addon11"
                  value="{{ $data->book_cover }}"
                />
                @error('book_cover')<div class="invalid-feedback ml-1">{{ $message }}</div>@enderror
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
