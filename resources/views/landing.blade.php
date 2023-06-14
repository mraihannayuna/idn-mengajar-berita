<!DOCTYPE html>
<html>
  <head>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <style>
      ::-webkit-scrollbar {
        display: none;
      }
      .hero-image {
        background-image: url("{{asset("img/anete-lusina-zwsHjakE_iI-unsplash.jpg")}}");
        background-color: black;
        box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.55);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 415px;
        position: relative;
      }

      .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
      }
    </style>
  </head>
  <body>
    @extends('layouts.template') @section('content')

    <div class="hero-image">
      <div class="hero-text">
        <h1>Welcome to Newsku</h1>
        <p>Your go-to destination for informative and engaging blog posts</p>
        @if (!Auth::check())
        <a href="#main" class="btn btn-md btn-outline-light rounded-pill"
          >Continue</a
        >
        @elseif (Auth::user()->is_admin == true)
        <a
          href="{{route('posts.index')}}"
          class="btn btn-md btn-outline-light rounded-pill"
          >Admin Panel</a
        >
        @else
        <a
          href="{{route('posts.index')}}"
          class="btn btn-md btn-outline-light rounded-pill"
          >Continue</a
        >
        @endif
      </div>
    </div>

    <div class="row mt-3 mx-4 mb-1" id="main">
		@foreach ($posts as $post)
		<div class="posts col-md-12">
			<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative align-items-center">
				<div class="col-8 p-4 d-flex flex-column position-static">
					<strong class="d-inline-block text-primary-emphasis">{{$post->writer['name']}}</strong>
					<h3 class="mb-0">{{$post->title}}</h3>
					<div class="mb-1 text-body-secondary">{{ date("d M Y", strtotime($post->created_at)) }}</div>
					<p class="card-text mb-auto">{!!$post->content!!}</p>
					<a href="{{ route('posts.show' , $post) }}" class="icon-link gap-1 icon-link-hover stretched-link">
						Read more a this
					</a>
				</div>
				@if ($post->image)
					<div class="col-4 d-none d-lg-block">
						<img style="max-width: 100%; max-height: 260px; object-fit: cover;" src="{{ url('storage/img/' . $post->image) }}" alt="">
					</div>
				@endif
			</div>
		</div>
		@endforeach
	</div>

    @endsection
  </body>
</html>
