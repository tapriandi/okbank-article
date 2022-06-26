@extends('layouts/default')

@section('content')

<div class="relative h-full">
  <!-- banner -->
  <section class="pt-10 z-10">
    <div class="px-3 sm:px-10 lg:px-40">
      <div class="box-img">
        <img src="{{ asset($article->image)}}" alt="">
      </div>
      <h1 class="text-lg font-bold md:text-3xl py-10">{{ $article->title }}</h1>
      {!! $article->content !!}
    </div>
  </section>

  <!-- artikell -->
  <section class="mt-10 py-10 bg-blue-100">
    <div class="ocontainer mx-auto px-3 py-10">
      <h2 class="text-center text-lg font-bold text-white lg:text-3xl">Artikel Lainnya</h2>
      <div class="py-5 px-0 flex flex-wrap justify-center lg:py-10 lg:px-20">
          @foreach($other_articles as $other_article)
          <a href="{{ url('article/' . $other_article->uri) }}" class="card-article bg-white other">
              <img src="{{ asset($other_article->image)}}" alt="">
              <div class="wrap">
                  <p class="category-card">{{ $other_article->category['name'] }}
                      <span class="text-black pl-2">{{ $other_article->created_at->format('D M Y') }}</span>
                  </p>
                  <p class="title-card ellipsis-3">{{$other_article->title}}</p>
              </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
</div>

@endsection