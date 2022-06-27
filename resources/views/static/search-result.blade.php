@extends('layouts/default')

@section('content')
    <div class="category-detail pt-4 ocontainer-1 pt-10 pb-20">
        {{-- Artikel --}}
        <h2 class="pb-6 font-bold text-xl lg:text-3xl">Hasil Pencarian Artikel</h2>
        <div class="flex flex-wrap justify-center lg:px-5">
            @forelse ($articles as $key => $article)
                <a href="{{ url('article/' . $article->uri) }}" class="card-article">
                    <img src="{{ asset($article->image) }}" alt="">
                    <div class="wrap">
                        <p class="category-card">{{ $article->category['name'] }}
                            <span class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span>
                        </p>
                        <p class="title-card ellipsis-3">{{ $article->title }}</p>
                    </div>
                </a>
            @empty
                <p class="py-28">Pencarian Artikel untuk keyword '{{ $keyword }}' tidak ditemukan</p>
            @endforelse
        </div>

        @include('partials/pager', ['paginator' => $articles, 'interval' => 5])

        <div class="pb-10"></div>
        <hr>
        {{--links  --}}
        <h2 class="pt-10 pb-6 font-bold text-xl lg:text-3xl">Hasil Pencarian Link</h2>
        <div class="flex flex-wrap justify-center lg:px-5">
            @forelse ($links as $key => $link)
                <a href="{{ $link->link }}" class="card-article border" target="_blank">
                    <div class="wrap">
                        <p class="category-card">{{ $link->category }}
                            <span class="text-black pl-2">{{ $link->created_at->format('D M Y') }}</span>
                        </p>
                        <p class="title-card ellipsis-3">{{ $link->title }}</p>
                    </div>
                </a>
            @empty
                <p class="py-28">Pencarian Link untuk keyword '{{ $keyword }}' tidak ditemukan</p>
            @endforelse
        </div>

        @include('partials/pager', ['paginator' => $links, 'interval' => 5])
    </div>
@endsection
