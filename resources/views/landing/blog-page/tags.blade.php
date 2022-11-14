@extends('layouts.landing')

@section('title')
    Semua Tag
@endsection

@section('content')
    {{-- Navhome section start --}}
    @include('landing.blog-page.partials-blog.navblog')
    {{-- Navhome section end --}}
    <section id="blog" class="pt-36 pb-32 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h2 class="uppercase font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-3xl">
                        Label Tag
                    </h2>
                </div>
            </div>
            {{-- Start card blog --}}
            <div class="flex flex-wrap">
                @forelse($tags as $tag)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/4">
                        <div class="bg-primary rounded-xl shadow-lg overflow-hidden mb-10">
                            <div class="py-8 px-6">
                                <h3>
                                    <a class="uppercase flex justify-center mb-3 font-semibold text-xl text-dark hover:text-white transition duration-300 ease-in-out"
                                        href="{{ route('landing.post-tag', ['slug' => $tag->slug]) }}">
                                        #{{ $tag->title }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="pt-36 pb-32 w-full px-4 text-center">
                        <h3 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">
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
