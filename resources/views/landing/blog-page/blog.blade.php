@extends('layouts.landing')

@section('title')
    Blog
@endsection

@section('content')
    {{-- Navhome section start --}}
    @include('landing.blog-page.partials-blog.navblog')
    {{-- Navhome section end --}}
    <section id="blog" class="pt-36 pb-32 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">Kumpulan Blog</h2>
                    <h4 class="font-semibold text-lg text-primary mb-2">GUIDOFAMULA.COM</h4>

                    {{-- Search box start --}}
                    <form action="{{ route('landing.blog') }}" method="get">
                        <div class="flex justify-center mt-5">
                            <div class="mb-3 xl:w-96">
                                <input type="search" name="keyword" type="search" value="{{ request()->get('keyword') }}"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-secondary bg-white bg-clip-padding border border-solid border-gray-300 rounded-md transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-primary focus:outline-none"
                                    id="exampleSearch" placeholder="Cari artikel..." />
                            </div>
                        </div>
                    </form>
                    {{-- Search box ends --}}
                </div>
            </div>
            {{-- Start card blog --}}
            <div class="flex flex-wrap">
                @forelse($posts as $post)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            @if (file_exists(public_path($post->thumbnail)))
                                <img class="w-full" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                            @else
                                <img class="w-full" src="http://via.placeholder.com/360x200" alt="{{ $post->title }}">
                            @endif
                            <div class="py-8 px-6">
                                <h3>
                                    <a class="block mb-3 font-semibold text-xl text-dark hover:text-primary "
                                        href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="font-medium text-base text-secondary mb-6">
                                    {{ Str::limit($post->description, 120) }}
                                </p>
                                <a class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80"
                                    href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="pt-36 pb-32 w-full px-4 text-center">
                        <h3 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">
                            Artikel tidak ditemukan
                        </h3>
                    </div>
                @endforelse
                {{-- End Card blog --}}
            </div>
            @if ($posts->hasPages())
                <div class="row">
                    <div class="col">
                        {{ $posts->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            @endif
        </div>
        {{-- Navdown start --}}
        @include('landing.blog-page.partials-blog.navdown')
        {{-- Navdown start --}}
    </section>
@endsection
