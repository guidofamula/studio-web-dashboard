@extends('layouts.landing')

@section('title')
    Semua Tag
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
                        Label Tag
                    </h2>
                </div>
            </div>
            {{-- Start card blog --}}
            <div class="flex flex-wrap">
                @forelse($tags as $tag)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/4">
                        <div class="mb-10 overflow-hidden rounded-xl bg-primary shadow-lg">
                            <div class="py-8 px-6">
                                <h3>
                                    <a class="mb-3 flex justify-center text-xl font-semibold uppercase text-dark transition duration-300 ease-in-out hover:text-white"
                                        href="{{ route('landing.post-tag', ['slug' => $tag->slug]) }}">
                                        #{{ $tag->title }}
                                    </a>
                                </h3>
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
            @if ($tags->hasPages())
                <div class="row">
                    <div class="col">
                        {{ $tags->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            @endif
        </div>
        {{-- Navdown start --}}
        @include('landing.blog-page.partials-blog.navdown')
        {{-- Navdown start --}}
    </section>
@endsection
