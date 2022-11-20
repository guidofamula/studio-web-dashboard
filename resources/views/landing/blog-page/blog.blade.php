@extends('layouts.landing')

@section('title')
    Blog
@endsection

@section('content')
    {{-- Navhome section start --}}
    @include('landing.blog-page.partials-blog.navblog')
    {{-- Navhome section end --}}
    <section id="blog" class="bg-slate-100 pt-36 pb-32 dark:bg-slate-700">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto mb-16 max-w-xl text-center">
                    <h2
                        class="mb-4 text-3xl font-bold text-dark dark:text-white dark:hover:text-primary sm:text-4xl lg:text-5xl">
                        Kumpulan Blog</h2>
                    <h4 class="mb-2 text-lg font-semibold text-primary">GUIDOFAMULA.COM</h4>

                    {{-- Search box start --}}
                    <form action="{{ route('landing.blog') }}" method="get">
                        <div class="mt-5 flex justify-center">
                            <div class="mb-3 xl:w-96">
                                <input type="search" name="keyword" type="search" value="{{ request()->get('keyword') }}"
                                    class="form-control m-0 block w-full rounded-md border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-secondary transition ease-in-out focus:border-primary focus:bg-white focus:text-gray-700 focus:outline-none dark:bg-slate-600 dark:text-white dark:focus:border-slate-400 dark:focus:ring-white"
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
                        <div
                            class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-dark dark:bg-opacity-70 dark:shadow-slate-600">
                            @if (file_exists(public_path($post->thumbnail)))
                                <img class="w-full" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                            @else
                                <img class="w-full" src="http://via.placeholder.com/360x200" alt="{{ $post->title }}">
                            @endif
                            <div class="py-8 px-6">
                                <h3>
                                    <a class="mb-3 block text-xl font-semibold text-dark hover:text-primary dark:text-primary dark:hover:text-white"
                                        href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="mb-6 text-base font-medium text-secondary">
                                    {{ Str::limit($post->description, 120) }}
                                </p>
                                <a class="rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white hover:opacity-80 dark:hover:bg-secondary"
                                    href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full px-4 pt-36 pb-32 text-center">
                        <h3 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl">
                            Artikel tidak ditemukan
                        </h3>
                    </div>
                @endforelse
                {{-- End Card blog --}}
            </div>
            @if ($posts->hasPages())
                <div class="row">
                    <div class="col">
                        {{ $posts->links('vendor.pagination.simple-tailwind') }}
                    </div>
                </div>
            @endif
        </div>
        {{-- Navdown start --}}
        @include('landing.blog-page.partials-blog.navdown')
        {{-- Navdown start --}}
    </section>
@endsection
