@extends('layouts/default')

@section('content')
    <div class="category-detail pt-4 ocontainer-1 py-10">
        <h2 class="pb-5 font-bold text-xl lg:text-3xl">Hasil Pencarian</h2>
        <div class="flex flex-wrap justify-center lg:px-5">
            @if (strlen($articles))
                <p class="py-20">Pencarian artikel tidak ditemukan</p>
            @else
                @foreach ($articles as $key => $article)
                    <a href="{{ url('article/' . $article->uri) }}" class="card-article">
                        <img src="{{ asset($article->image) }}" alt="">
                        <div class="wrap">
                            <p class="category-card">{{ $article->category['name'] }}
                                <span class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span>
                            </p>
                            <p class="title-card ellipsis-3">{{ $article->title }}</p>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection