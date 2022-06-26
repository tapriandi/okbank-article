@extends('layouts/default')

@section('content')
    <div class="category-detail pt-4 ocontainer-1 py-10">
        <h2 class="pb-5 font-bold text-xl lg:text-3xl">Artikel Finansial</h2>
        <div class="flex flex-wrap justify-center lg:px-5">
            @if (strlen($articleFinances))
                <p class="py-20">Belum ada artikel tentang Finansial</p>
            @else
                @foreach ($articleFinances as $key => $articleFinance)
                    <a href="{{ url('article/' . $articleFinance->uri) }}" class="card-article">
                        <img src="{{ asset($articleFinance->image) }}" alt="">
                        <div class="wrap">
                            <p class="category-card">{{ $articleFinance->category['name'] }}
                                <span class="text-black pl-2">{{ $articleFinance->created_at->format('D M Y') }}</span>
                            </p>
                            <p class="title-card ellipsis-3">{{ $articleFinance->title }}</p>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection
