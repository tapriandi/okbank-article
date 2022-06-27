@extends('layouts/default')

@section('content')
    <div class="category-detail ocontainer-1 pt-10 pb-20">
        <h2 class="pb-6 font-bold text-xl lg:text-3xl">Artikel Karir & Sukses</h2>
        <div class="flex flex-wrap justify-center lg:px-5">
            @forelse ($articleCareers as $key => $articleCareer)
                <a href="{{ url('article/' . $articleCareer->uri) }}" class="card-article">
                    <img src="{{ asset($articleCareer->image) }}" alt="">
                    <div class="wrap">
                        <p class="category-card">{{ $articleCareer->category['name'] }}
                            <span class="text-black pl-2">{{ $articleCareer->created_at->format('D M Y') }}</span>
                        </p>
                        <p class="title-card ellipsis-3">{{ $articleCareer->title }}</p>
                    </div>
                </a>
            @empty
                <p class="py-28">Belum ada artikel tentang Karir & Sukses</p>
            @endforelse
        </div>
    </div>
@endsection
