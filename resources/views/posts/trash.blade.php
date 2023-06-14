@extends('layouts.template') @section('title', "Beranda") @section('content')

<div
  class="container p-3 d-flex flex-column justify-content-center text-center align-items-center"
>
  <nav aria-label="breadcrumb" class="my-2">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <i class="fa-solid fa-home me-1"></i
        ><a
          href="{{route('posts.index')}}"
          class="text-decoration-none text-muted fw-semibold"
          >Home</a
        >
      </li>
      <li class="breadcrumb-item active" aria-current="page">Deleted News</li>
    </ol>
  </nav>
</div>

<h2 class="text-center font-bold">Deeleted Post</h2>
@foreach ($posts as $post)
<div class="posts card h-25">
  <div class="card-body">
    <h5 class="card-title">
      {{ $post->title }}<small class="px-2 text-muted fs-6 fw-light display-6"
        >{{$post->writer['name']}}</small
      >
    </h5>
    <hr />
    <p class="card-text">
      {!!Illuminate\Support\Str::limit($post->content, 400)!!}
    </p>
    <small class="card-text text-end fw-light">
      <span>{{$post->comments->count()}} Comments</span>
    </small>
    <br />
    <small class="card-text text-end fw-light">
      <span>{{ date("d M Y", strtotime($post->created_at)) }}</span>
    </small>
  </div>
  <div class="button d-flex">
    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-dark"
      >View More</a
    >
  </div>
</div>
@endforeach
@endsection
