@extends('layouts.landing')

@section('title')
    Kategori: {{ $category->title }}
@endsection

@section('content')
    {{-- Navhome section start --}}
    @include('landing.blog-page.partials-blog.navblog')
    {{-- Navhome section end --}}
    <section id="blog" class="bg-slate-100 pt-36 pb-32 dark:bg-slate-700">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto mb-16 max-w-xl text-center">
                    <h2 class="mb-4 text-3xl font-bold uppercase text-dark dark:text-primary sm:text-4xl lg:text-3xl">
                        Kategori Postingan</h2>
                    <div class="mt-10">
                        <a href="#"
                            class="rounded-full bg-primary py-3 px-8 text-base font-semibold uppercase text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg dark:hover:bg-secondary">
                            {{ $category->title }}
                        </a>
                    </div>
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
                                    <a class="mb-3 block text-xl font-semibold text-dark transition duration-300 ease-in-out hover:text-primary dark:text-primary dark:hover:text-white"
                                        href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="mb-6 text-base font-medium text-secondary">
                                    {{ Str::limit($post->description, 120) }}
                                </p>
                                <a class="flex justify-center rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white transition duration-300 ease-in-out hover:opacity-80 dark:hover:bg-secondary"
                                    href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full px-4 pt-36 pb-32 text-center">
                        <h3 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl">
                            Artikel belum ada untuk kategori
                            <span class="text-primary">
                                {{ $category->title }}
                            </span>
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
