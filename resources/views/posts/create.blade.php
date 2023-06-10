@extends('layouts.template') @section('title', "Buat Postingan") @section('content')
<div class="container my-3">
  <h2 class="title">Buat Posting Baru</h2>
  <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="title" class="form-label">Judul Postingan</label>
    <input type="text" class="form-control" id="title" name="title" required />
    <label for="content" class="form-label">Konten</label>
    <textarea
      class="form-control"
      id="content"
      rows="4"
      name="content"
      required
    ></textarea>
    <label for="image" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="image" name="file" />
    <button
      type="submit"
      formnovalidate="formnovalidate"
      name="save"
      class="btn btn-dark mt-2 mb-5"
    >
      Save
    </button>
    <button type="submit" name="save" class="btn btn-dark mt-2 mb-5">
      <a class="text-decoration-none text-light" href="{{ route('posts.index') }}"
        >Back</a
      >
    </button>
  </form>
</div>
@endsection
