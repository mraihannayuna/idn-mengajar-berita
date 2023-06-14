@extends('layouts.template') 
@section('title', "Edit Post: {{$post->title}}")
@section('content')
<div class="container">
  <h2 class="title">Edit Post</h2>
  <form method="POST" action="{{ route('posts.update', $post->id) }}">
    @method('PATCH') @csrf
    <label for="title" class="form-label">Judul Postingan</label>
    <input
      type="text"
      class="form-control"
      id="title"
      name="title"
      value="{{ $post->title }}"
      required
    />
    <label for="content" class="form-label">Konten</label>
    <textarea
      class="form-control"
      id="content"
      rows="4"
      name="content"
      value="{{ $post->content }}"
      required
    >
{!! $post->content !!}</textarea
    >
    <label for="image" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="image" name="file" />
    <button
      type="submit"
      formnovalidate="formnovalidate"
      name="save"
      class="btn btn-dark my-2"
    >
      Save
    </button>
    <button type="submit" name="back" class="btn btn-dark my-2">
      <a class="text-decoration-none text-light" href="{{ route('posts.index') }}"
        >Back</a
      >
    </button>
    <button
      type="button"
      class="btn btn-danger px-4"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
    >
      Delete
    </button>
  </form>
</div>
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered rounded-1">
    <div class="modal-content rounded-1">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Postingan</h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus postingan
        <span class="fw-bold">{{$post->title}}</span>
      </div>
      <div class="modal-footer">
        <form method="post" action="{{ route('posts.destroy', $post->id) }}">
          @method('DELETE') @csrf
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
          Gajadi
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
