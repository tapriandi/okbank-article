@extends('layouts/default')

@section('content')
    <div class="homepage ocontainer-1 pb-20 z-0">
        <div class="hero">
            <div class="title main">
                <p class="line">Topik Hari Ini</p>
            </div>
            <div class="grid gap-3 grid-rows-4 grid-flow-col md:grid-rows-2 md:gap-5">
                @foreach ($articles as $key => $article)
                    @if ($key == 0)
                        <a href="{{ url('article/' . $article->uri) }}" class="card-article row-span-2 col-span-2 big">
                            <img src="{{ asset($article->image) }}" alt="">
                            <div class="wrap">
                                <p class="category-card">{{ $article->category['name'] }}
                                    <span class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span>
                                </p>
                                <p class="title-card ellipsis-2">{{ $article->title }}</p>
                                <p class="text-sm md:text-base pt-3 ellipsis-3">{{ strip_tags($article->content) }}</p>
                            </div>
                        </a>
                    @elseif ($key < 5 && $key > 0)
                        <a href="{{ url('article/' . $article->uri) }}" class="card-article">
                            <img src="{{ asset($article->image) }}" alt="">
                            <div class="wrap">
                                <p class="category-card">{{ $article->category['name'] }}
                                    <span class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span>
                                </p>
                                <p class="title-card ellipsis-3">{{ $article->title }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="middle pt-8">
            <div class="flex items-start flex-col lg:flex-row lg:space-x-8 ">
                <div class="wrapper">
                    <div>
                        <div class="title">
                            <div class="flex">
                                <p class="line">Fokus Ok Bank: </p>
                                <p class="text-red-500 pl-2 text-xs md:text-base lg:text-lg">Atur Keuangan Selama Covid-19
                                </p>
                            </div>
                            <a href="{{ url('karir-&-sukses') }}" class="link">selengkapnya</a>
                        </div>
                        <div class="article-slider block lg:hidden">
                            @foreach ($articleCareers as $key => $articleCareer)
                                @if ($key <= 5)
                                    <a href="{{ url('article/' . $articleCareer->uri) }}" class="card-article">
                                        <img src="{{ asset($articleCareer->image) }}" alt="">
                                        <div class="wrap">
                                            <p class="category-card">{{ $articleCareer->category['name'] }}
                                                <span
                                                    class="text-black pl-2">{{ $articleCareer->created_at->format('D M Y') }}</span>
                                            </p>
                                            <p class="title-card ellipsis-3">{{ $articleCareer->title }}</p>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="grid-cols-3 gap-5 hidden lg:grid">
                            @foreach ($articleCareers as $key => $articleCareer)
                                @if ($key <= 2)
                                    <a href="{{ url('article/' . $articleCareer->uri) }}" class="card-article">
                                        <img src="{{ asset($articleCareer->image) }}" alt="">
                                        <div class="wrap">
                                            <p class="category-card">{{ $articleCareer->category['name'] }}
                                                <span
                                                    class="text-black pl-2">{{ $articleCareer->created_at->format('D M Y') }}</span>
                                            </p>
                                            <p class="title-card ellipsis-3">{{ $articleCareer->title }}</p>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- ads mobile --}}
                    <div class="py-5 w-full block lg:hidden">
                        @foreach ($ads as $ad)
                            <a href="{{ $ad->link }}" target="_blank">
                                <img class="w-full" src="{{ asset($ad->image_mobile) }}" alt="{{ $ad->title }}">
                            </a>
                        @endforeach
                    </div>

                    <div class="pt-4">
                        <div class="title">
                            <div class="flex">
                                <p class="line">Finansial</p>
                            </div>
                            <a href="{{ url('finansial') }}" class="link">selengkapnya</a>
                        </div>
                        <div class="article-slider block lg:hidden">
                            @foreach ($articleFinances as $key => $articleFinance)
                                @if ($key <= 5)
                                    <a href="{{ url('article/' . $articleFinance->uri) }}" class="card-article">
                                        <img src="{{ asset($articleFinance->image) }}" alt="">
                                        <div class="wrap">
                                            <p class="category-card">{{ $articleFinance->category['name'] }}
                                                <span
                                                    class="text-black pl-2">{{ $articleFinance->created_at->format('D M Y') }}</span>
                                            </p>
                                            <p class="title-card ellipsis-3">{{ $articleFinance->title }}</p>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <div class="grid-cols-3 gap-5 hidden lg:grid">
                            @foreach ($articleFinances as $key => $articleFinance)
                                @if ($key <= 2)
                                    <a href="{{ url('article/' . $articleFinance->uri) }}" class="card-article">
                                        <img src="{{ asset($articleFinance->image) }}" alt="">
                                        <div class="wrap">
                                            <p class="category-card">{{ $articleFinance->category['name'] }}
                                                <span
                                                    class="text-black pl-2">{{ $articleFinance->created_at->format('D M Y') }}</span>
                                            </p>
                                            <p class="title-card ellipsis-3">{{ $articleFinance->title }}</p>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <a href="#" class="okbtn mt-5 mx-auto text-sm orange">Kirim Tulisan</a>

                        <div class="pt-10 block lg:hidden">
                            <div class="title">
                                <p class="line">Artikel Terbaru</p>
                            </div>
                            <div class="article-slider-2">
                                @foreach ($articles as $key => $article)
                                    @if ($key <= 5)
                                        <a href="{{ url('article/' . $article->uri) }}" class="card-article b">
                                            <img src="{{ asset($article->image) }}" alt="">
                                            <div class="wrap">
                                                <p class="title-card ellipsis-2">{{ $article->title }}</p>
                                                <p class="body ellipsis-3">{{ strip_tags($article->content) }}</p>
                                                <p class="category-card">{{ $article->category['name'] }}
                                                    <span
                                                        class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span>
                                                </p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="popular pt-5 lg:pt-0">
                    <div class="title">
                        <p class="line">Populer</p>
                    </div>
                    @foreach ($links as $key => $link)
                        @if ($key <= 6)
                            <a href="{{ $link->link }}" class="card-article border" target="_blank">
                                <div class="wrap">
                                    <p class="category-card">{{ $link->category }}
                                        <span class="text-black pl-2">{{ $link->created_at->format('D M Y') }}</span>
                                    </p>
                                    <p class="title-card ellipsis-3">{{ $link->title }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bottom pt-8">
            <div class="grid gap-3 md:grid-flow-col md:grid-rows-1 md:gap-5">
                <div class="md:col-span-2">
                    <div class="title">
                        <p class="line">Pojok Ok Bank</p>
                    </div>
                    @foreach ($links as $key => $link)
                        @if ($key <= 3)
                            <a href="{{ $link->link }}" class="card-article border" target="_blank">
                                <div class="wrap">
                                    <p class="category-card">{{ $link->category }}<span
                                            class="text-black pl-2">{{ $link->created_at->format('D M Y') }}</span></p>
                                    <p class="title-card ellipsis-3">{{ $link->title }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                    <div class="pt-3">
                        @foreach ($articles as $key => $article)
                            @if ($key <= 3)
                                <a href="{{ url('article/' . $article->uri) }}" class="card-article b border">
                                    <img src="{{ asset($article->image) }}" alt="">
                                    <div class="wrap">
                                        <p class="title-card ellipsis-2">{{ $article->title }}</p>
                                        <p class="body ellipsis-3">{{ strip_tags($article->content) }}</p>
                                        <p class="category-card">{{ $article->category['name'] }}
                                            <span
                                                class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span>
                                        </p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-span-3 hidden lg:block">
                    <div class="title">
                        <p class="line">Artikel Terbaru</p>
                    </div>
                    <div class="flex flex-col space-y-4">
                        @foreach ($articles as $key => $article)
                            @if ($key < 5)
                                <a href="{{ url('article/' . $article->uri) }}" class="card-article b">
                                    <img src="{{ asset($article->image) }}" alt="">
                                    <div class="wrap">
                                        <p class="title-card ellipsis-2">{{ $article->title }}</p>
                                        <p class="body ellipsis-3">{{ strip_tags($article->content) }}</p>
                                        <p class="category-card">{{ $article->category['name'] }}
                                            <span
                                                class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span>
                                        </p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="card-article md:col-span-2 hidden lg:block no-hover">
                    @foreach ($ads as $key => $ad)
                        <a href="{{ $ad->link }}" target="_blank">
                            <img src="{{ asset($ad->image_desktop) }}" alt="{{ $ad->title }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
