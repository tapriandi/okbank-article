@extends('layouts/default')

@section('content')
    <div class="category-detail ocontainer-1 pt-10 pb-20">
        <h2 class="pb-6 font-bold text-xl lg:text-3xl">Artikel Finansial</h2>
        <div class="flex flex-wrap justify-center lg:px-5">
            @forelse ($articleFinances as $key => $articleFinance)
                <a href="{{ url('article/' . $articleFinance->uri) }}" class="card-article">
                    <img src="{{ asset($articleFinance->image) }}" alt="">
                    <div class="wrap">
                        <p class="category-card">{{ $articleFinance->category['name'] }}
                            <span class="text-black pl-2">{{ $articleFinance->created_at->format('D M Y') }}</span>
                        </p>
                        <p class="title-card ellipsis-3">{{ $articleFinance->title }}</p>
                    </div>
                </a>
            @empty
                <p class="py-28">Belum ada artikel tentang Finansial</p>
            @endforelse
        </div>
    </div>
@endsection
