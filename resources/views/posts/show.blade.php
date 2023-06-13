@extends('layouts.template') 
@section('title', "$post->title") 
@section('content')
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <i class="fa-solid fa-home me-1"></i
        ><a
          href="{{route('posts.index')}}"
          class="text-decoration-none text-muted fw-semibold"
          >Home</a
        >
      </li>
      <li class="breadcrumb-item" aria-current="page">Blog</li>
      <li class="breadcrumb-item active" aria-current="page">
        {{$post->title}}
      </li>
    </ol>
  </nav>

  <article class="blog-post mb-4">
    <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
    <p class="blog-post-meta">
      {{ date("d M Y", strtotime($post->created_at)) }} by
      <small class="fs-6 text-muted fw-light display-6"
        >{{$post->author}}</small
      >
    </p>
    @if ($post->image)
    <div class="my-4 rounded-2">
      <img
        src="{{ url('storage/img/' . $post->image) }}"
        alt="Post Image"
        class="img-fluid rounded-3 shadow-lg"
        width="50%"
        height="auto"
      />
    </div>
    @endif
    <p>{!! $post->content !!}</p>
  </article>

  <div class="my-4">
    <h5>Comments ({{$post->comments->count()}})</h5>
    <div class="comment pt-2">
      @if ($post->comments->count() > 0) 
      @foreach ($post->comments->reverse() as $comment)
      <div class="comment-container">
        <div>
          <h6 class="nama_commentator pt-2">
            {{$comment->commentator_name}}<small
              class="px-2 text-muted fs-6 fw-light display-6"
              >{{date('D H:i', strtotime($comment->created_at))}}</small
            >
          </h6>
          <p class="comment_commentator">{!!$comment->comment!!}</p>
        </div>
        @if (Auth::check() && (Auth::user()->name == $comment->commentator_name ||
        $post->author == Auth::user()->name))
        <form
          method="post"
          action="{{ route('comment.delete', $comment) }}"
        >
          @method('DELETE') @csrf
          <button type="submit" class="btn btn-sm btn-danger">-</button>
        </form>
        @endif
      </div>
      @endforeach 
      @else
      <p class="text-muted">No comments yet.</p>
      @endif
    </div>
  </div>

  @if (Auth::check())
  <div class="my-4 pb-5">
    <h6>Add a Comment</h6>
    <form
      action="{{ route('comment.create') }}"
      method="POST"
      enctype="multipart/form-data"
    >
      @method('POST') @csrf
      <input type="hidden" name="post_id" value="{{ $post->id }}" />
      <input type="hidden" name="commentator_id" value="{{ Auth::user()->id }}" />
      <div class="form-group">
        <input
          type="hidden"
          class="form-control"
          id="name"
          name="commentator_name"
          value="{{Auth::user()->name}}"
        />
      </div>
      <div class="form-group">
        <textarea
          class="form-control rounded-1"
          id="content"
          name="comment"
          rows="2"
          placeholder="Type your comment..."
        >
{!! old('comment') !!}</textarea
        >
      </div>
      <button
        type="submit"
        formnovalidate="formnovalidate"
        name="save"
        class="btn btn-md my-2 btn-outline-primary"
      >
        Send
      </button>
    </form>
  </div>
  @endif
</div>
@endsection