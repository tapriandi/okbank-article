@extends('layouts/default')

@section('content')
    <div class="category-detail ocontainer-1 pt-10 pb-20">
        <h2 class="pb-6 font-bold text-xl lg:text-3xl">Artikel Gaya Hidup</h2>
        <div class="flex flex-wrap justify-center lg:px-5">
            @forelse ($articleLifeStyles as $key => $articleLifeStyle)
                <a href="{{ url('article/' . $articleLifeStyle->uri) }}" class="card-article">
                    <img src="{{ asset($articleLifeStyle->image) }}" alt="">
                    <div class="wrap">
                        <p class="category-card">{{ $articleLifeStyle->category['name'] }}
                            <span class="text-black pl-2">{{ $articleLifeStyle->created_at->format('D M Y') }}</span>
                        </p>
                        <p class="title-card ellipsis-3">{{ $articleLifeStyle->title }}</p>
                    </div>
                </a>
            @empty
                <p class="py-28">Belum ada artikel tentang Gaya Hidup</p>
            @endforelse
        </div>
    </div>
@endsection
