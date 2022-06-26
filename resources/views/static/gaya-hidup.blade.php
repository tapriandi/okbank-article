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
                    <a href="" class="card-article row-span-2 col-span-2 big">
                        <img src="{{ asset($article->image)}}" alt="">
                        <div class="wrap">
                            <p class="category-card">{{ $article->article_tag }} <span class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span></p>
                            <p class="title-card ellipsis-2">{{ $article->title }}</p>
                            <p class="text-sm md:text-base pt-3">{{ $article->content }}</p>
                        </div>
                    </a>
                    @else
                    <a href="" class="card-article">
                        <img src="{{ asset($article->image)}}" alt="">
                        <div class="wrap">
                            <p class="category-card">OK Bank <span class="text-black pl-2">{{ $article->created_at->format('D M Y') }}</span></p>
                            <p class="title-card ellipsis-3">{{$article->title}}</p>
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
                            <a href="" class="link">selengkapnya</a>
                        </div>
                        <div class="article-slider block lg:hidden">
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                        </div>
                        <div class="grid-cols-3 gap-5 hidden lg:grid">
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="py-5 w-full block lg:hidden">
                        @foreach ($ads as $ad)
                        <a href="{{ $ad->link }}" target="_blank">
                            <img class="w-full" src="{{ asset($ad->image_mobile)}}" alt="{{ $ad->title }}" >
                        </a>
                        @endforeach
                    </div>

                    <div class="pt-4">
                        <div class="title">
                            <div class="flex">
                                <p class="line">Ok Bank </p>
                            </div>
                            <a href="" class="link">selengkapnya</a>
                        </div>
                        <div class="article-slider block lg:hidden">
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                        </div>
                        <div class="grid-cols-3 gap-5 hidden lg:grid">
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                            <a href="" class="card-article">
                                <img src="{{ asset('images/img.jpg') }}" alt="">
                                <div class="wrap">
                                    <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                                    <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Officia,
                                        soluta?</p>
                                </div>
                            </a>
                        </div>
                        <a href="" class="okbtn mt-5 mx-auto text-sm orange">Kirim Tulisan</a>

                        <div class="pt-10 block lg:hidden">
                            <div class="title">
                                <p class="line">Artikel Terbaru</p>
                            </div>
                            <div class="article-slider-2">
                                <a href="" class="card-article b">
                                    <img src="{{ asset('images/img.jpg') }}" alt="">
                                    <div class="wrap">
                                        <p class="title-card ellipsis-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                        </p>
                                        <p class="body text-xs ellipsis-3">Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Quam at libero amet quaerat minus eos vero rem asperiores
                                            voluptatem et.</p>
                                        <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span>
                                        </p>
                                    </div>
                                </a>
                                <a href="" class="card-article b">
                                    <img src="{{ asset('images/img.jpg') }}" alt="">
                                    <div class="wrap">
                                        <p class="title-card ellipsis-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                        </p>
                                        <p class="body text-xs ellipsis-3">Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Quam at libero amet quaerat minus eos vero rem asperiores
                                            voluptatem et.</p>
                                        <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span>
                                        </p>
                                    </div>
                                </a>
                                <a href="" class="card-article b">
                                    <img src="{{ asset('images/img.jpg') }}" alt="">
                                    <div class="wrap">
                                        <p class="title-card ellipsis-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                        </p>
                                        <p class="body text-xs ellipsis-3">Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Quam at libero amet quaerat minus eos vero rem asperiores
                                            voluptatem et.</p>
                                        <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span>
                                        </p>
                                    </div>
                                </a>
                                <a href="" class="card-article b">
                                    <img src="{{ asset('images/img.jpg') }}" alt="">
                                    <div class="wrap">
                                        <p class="title-card ellipsis-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                        </p>
                                        <p class="body text-xs ellipsis-3">Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Quam at libero amet quaerat minus eos vero rem asperiores
                                            voluptatem et.</p>
                                        <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="popular pt-5 lg:pt-0">
                    <div class="title">
                        <p class="line">Populer</p>
                    </div>
                    @foreach ($links as $link)
                    {{-- {{ $links }} --}}
                        <a href="{{ $link->link }}" class="card-article border" target="_blank">
                            <div class="wrap">
                                <p class="category-card">{{ $link->category }}
                                    <span class="text-black pl-2">{{ $link->created_at->format('D M Y') }}</span>
                                </p>
                                <p class="title-card ellipsis-3" >{{ $link->title }}</p>
                            </div>
                        </a>
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
                    <a href="" class="card-article border">
                        <div class="wrap">
                            <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                            <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Officia,
                                soluta?</p>
                        </div>
                    </a>
                    <a href="" class="card-article border">
                        <div class="wrap">
                            <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                            <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Officia,
                                soluta?</p>
                        </div>
                    </a>
                    <a href="" class="card-article border">
                        <div class="wrap">
                            <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                            <p class="title-card ellipsis-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Officia,
                                soluta?</p>
                        </div>
                    </a>
                </div>
                <div class="col-span-3 hidden lg:block">
                    <div class="title">
                        <p class="line">Artikel Terbaru</p>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <a href="" class="card-article a">
                            <img src="{{ asset('images/img.jpg') }}" alt="">
                            <div class="wrap">
                                <p class="title-card ellipsis-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Officia, soluta?</p>
                                <p class="body ellipsis-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Placeat reprehenderit quo non dignissimos incidunt inventore officia eius sit
                                    repellendus atque.</p>
                                <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                            </div>
                        </a>
                        <a href="" class="card-article a">
                            <img src="{{ asset('images/img.jpg') }}" alt="">
                            <div class="wrap">
                                <p class="title-card ellipsis-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Officia, soluta?</p>
                                <p class="body ellipsis-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Placeat reprehenderit quo non dignissimos incidunt inventore officia eius sit
                                    repellendus atque.</p>
                                <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                            </div>
                        </a>
                        <a href="" class="card-article a">
                            <img src="{{ asset('images/img.jpg') }}" alt="">
                            <div class="wrap">
                                <p class="title-card ellipsis-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Officia, soluta?</p>
                                <p class="body ellipsis-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Placeat reprehenderit quo non dignissimos incidunt inventore officia eius sit
                                    repellendus atque.</p>
                                <p class="category-card">OK Bank <span class="text-black pl-2">DD MM YYYY</span></p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-article md:col-span-2 hidden lg:block no-hover">
                    @foreach ($ads as $ad)
                    <a href="{{ $ad->link }}" target="_blank">
                        <img src="{{ asset($ad->image_desktop)}}" alt="{{ $ad->title }}" >
                    </a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection
