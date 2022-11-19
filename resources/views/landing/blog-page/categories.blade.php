@extends('layouts.landing')

@section('title')
    Semua Kategori
@endsection

@section('content')
    {{-- Navhome section start --}}
    @include('landing.blog-page.partials-blog.navblog')
    {{-- Navhome section end --}}
    <section id="blog" class="bg-slate-100 pt-36 pb-32">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto mb-16 max-w-xl text-center">
                    <h2 class="mb-4 text-3xl font-bold uppercase text-dark sm:text-4xl lg:text-3xl">
                        Label Kategori
                    </h2>
                </div>
            </div>
            {{-- Start card blog --}}
            <div class="flex flex-wrap">
                @forelse($categories as $category)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                        <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg">
                            @if (file_exists(public_path($category->thumbnail)))
                                <img class="w-full" src="{{ asset($category->thumbnail) }}" alt="{{ $category->title }}">
                            @else
                                <img class="w-full" src="http://via.placeholder.com/360x200" alt="{{ $category->title }}">
                            @endif
                            <div class="py-8 px-6">
                                <h3>
                                    <a class="mb-3 block text-xl font-semibold text-dark hover:text-primary"
                                        href="{{ route('landing.post-category', ['slug' => $category->slug]) }}">
                                        {{ $category->title }}
                                    </a>
                                </h3>
                                <p class="mb-6 text-base font-medium text-secondary">
                                    {{ Str::limit($category->description, 120) }}
                                </p>
                                <a class="flex justify-center rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white hover:opacity-80"
                                    href="{{ route('landing.post-category', ['slug' => $category->slug]) }}">
                                    Lihat Kategori
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full px-4 pt-36 pb-32 text-center">
                        <h3 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl">
                            Kategori tidak ditemukan
                        </h3>
                    </div>
                @endforelse
                {{-- End Card blog --}}
            </div>
            @if ($categories->hasPages())
                <div class="row">
                    <div class="col">
                        {{ $categories->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            @endif
        </div>
        {{-- Navdown start --}}
        @include('landing.blog-page.partials-blog.navdown')
        {{-- Navdown start --}}
    </section>
@endsection
