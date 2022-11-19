@extends('layouts.landing')

@section('title')
    {{ $post->title }}
@endsection

@section('description')
    {{ $post->description }}
@endsection

@section('content')
    {{-- Navhome section start --}}
    @include('landing.blog-page.partials-blog.navblog')
    {{-- Navhome section end --}}
    <div class="container mt-10 py-6 md:py-10">
        <div class="mx-auto max-w-4xl">
            <div class="">
                <h1 class="font-body pt-10 text-3xl font-semibold text-primary sm:text-4xl md:text-5xl">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center pt-5 md:pt-10">
                    <div>
                        <img src="{{ asset('assets/images/guido-profil-2.png') }}"
                            class="border-grey-70 h-20 w-20 rounded-full border-2 shadow" alt="author image" />
                    </div>
                    <div class="pl-5">
                        <span class="font-body block text-xl font-semibold text-dark">
                            By: Guido Famula
                        </span>
                        <span class="font-body text-grey-30 block pt-1 text-xl text-secondary">
                            <i class="fas fa-regular fa-calendar-check text-primary"></i>
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>
                {{-- Start thumbnail --}}
                <div class="mt-5 mb-5 overflow-hidden rounded-xl bg-white shadow-lg">
                    @if (file_exists(public_path($post->thumbnail)))
                        <img class="w-full" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                    @else
                        <img class="w-full" src="http://via.placeholder.com/360x200" alt="{{ $post->title }}">
                    @endif
                </div>
                {{-- End Thumbnail --}}
                <div class="mt-4 border-t-2">
                    <div
                        class="max-sm:flex-col max-sm:w-52 max-sm:space-y-4 max-sm:mx-auto flex md:mx-0 md:w-full md:flex-row md:space-x-2 md:pt-3">
                        @foreach ($categories as $category)
                            <a href="{{ route('landing.post-category', ['slug' => $category->slug]) }}"
                                class="max-sm:text-center font-body hover:bg-grey-20 rounded-xl bg-primary py-1 font-bold text-white md:mr-1 md:px-4">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="prose max-w-none pt-8">
                {{-- Start content --}}
                <div class="mb-6 text-base font-medium text-slate-700 lg:text-lg">
                    {!! $post->content !!}
                </div>
                {{-- End content --}}

                {{-- Tag start --}}
                <h4 class="mb-3 mt-10 text-lg font-bold uppercase text-primary">
                    <span class="text-dark">Tag: </span>
                    {{ $post->title }}
                </h4>
                <div class="flex pt-3">
                    @foreach ($tags as $tag)
                        <a href="{{ route('landing.post-tag', ['slug' => $tag->slug]) }}"
                            class="font-body hover:bg-grey-20 mr-1 rounded-xl bg-primary px-4 py-1 font-bold text-white">
                            #{{ $tag->title }}
                        </a>
                    @endforeach
                </div>
                {{-- Tag End --}}

                {{-- Previous & next post  start --}}
                <div class="border-lila mt-10 flex justify-between border-t py-12">
                    @if ($previous)
                        <a href="{{ route('landing.post-detail', ['slug' => $previous->slug]) }}"
                            class="flex items-center">
                            <span
                                class="font-body block pr-2 font-bold uppercase text-primary sm:text-xs md:pr-5 lg:text-lg">
                                <i class="fas fa-solid fa-chevron-left text-2xl text-primary"></i>
                                Sebelumnya
                                <p class="transition duration-300 ease-in-out hover:text-dark hover:opacity-80">
                                    {{ Str::limit($previous->title, 25) }}</p>
                            </span>
                        </a>
                    @endif
                    @if ($next)
                        <a href="{{ route('landing.post-detail', ['slug' => $next->slug]) }}" class="flex items-center">
                            <span
                                class="font-body block pl-2 text-right font-bold uppercase text-primary sm:text-xs md:pl-5 lg:text-lg">
                                Selanjutnya
                                <i class="fas fa-solid fa-chevron-right text-2xl text-primary"></i>
                                <p class="transition duration-300 ease-in-out hover:text-dark hover:opacity-80">
                                    {{ Str::limit($next->title, 25) }}</p>
                            </span>
                        </a>
                    @endif
                </div>
                {{-- Previous & next post end --}}

                <div
                    class="border-lila flex flex-col items-center border-t py-12 pt-12 md:flex-row md:items-start xl:pb-20">
                    <div class="w-3/4 sm:w-2/5 lg:w-1/4 xl:w-1/5">
                        <img src="{{ asset('assets/images/guido-profil-2.png') }}" class="rounded-full border-t-2 shadow"
                            alt="Guido Famula" />
                    </div>
                    <div class="ml-0 text-center md:ml-10 md:w-5/6 md:text-left">
                        <h3 class="font-body pt-10 text-2xl font-bold text-secondary md:pt-0">
                            <a class="hover:text-primary" href="{{ route('landing.about') }}">
                                Guido Famula
                            </a>
                        </h3>
                        <p
                            class="font-body pt-5 text-lg leading-8 text-secondary sm:leading-9 md:text-xl md:leading-9 lg:leading-9 xl:leading-9">
                            Seorang web programmer yang tertarik dengan open source seputaran internet/IT, kernel linux,
                            distro OS, dan teknologi-teknologi framework.<br>
                            <span
                                class="cursor-pointer font-mono text-primary transition duration-300 ease-in-out hover:text-dark">#
                                pacman -Sy megantrovert</span>
                        </p>
                        <div class="flex items-center justify-center pt-5 md:justify-start">
                            {{-- Youtube icon start --}}
                            <a class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white"
                                href="https://www.youtube.com/guidofamula29/" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>YouTube</title>
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                            </a>
                            {{-- Youtube icon end --}}

                            {{-- Instagram icon start --}}
                            <a class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white"
                                href="https://www.instagram.com/guidofamula" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>Instagram</title>
                                    <path
                                        d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                </svg>
                            </a>
                            {{-- Instagram icon end --}}

                            {{-- Quora icon start --}}
                            <a class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white"
                                href="https://id.quora.com/profile/Guido-Famula" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>Quora</title>
                                    <path
                                        d="M7.3799.9483A11.9628 11.9628 0 0 1 21.248 19.5397l2.4096 2.4225c.7322.7362.21 1.9905-.8272 1.9905l-10.7105.01a12.52 12.52 0 0 1-.304 0h-.02A11.9628 11.9628 0 0 1 7.3818.9503Zm7.3217 4.428a7.1717 7.1717 0 1 0-5.4873 13.2512 7.1717 7.1717 0 0 0 5.4883-13.2511Z" />
                                </svg>
                            </a>
                            {{-- Quora icon end --}}

                            {{-- Linkedn icon start --}}
                            <a class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white"
                                href="https://id.linkedin.com/in/guido-famula" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>LinkedIn</title>
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            {{-- Linkedn icon end --}}

                            {{-- Github icon start --}}
                            <a class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white"
                                href="https://www.github.com/guidofamula" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>GitHub</title>
                                    <path
                                        d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                </svg>
                            </a>
                            {{-- Github icon end --}}
                        </div>
                    </div>
                </div>
                <div class="border-lila border-t py-5">
                    <h3 class="mb-3 mt-1 text-center text-lg font-bold uppercase text-primary">
                        Artikel Terkait
                    </h3>
                    <div class="border-lila flex justify-center border-t py-5">
                        <div class="flex flex-wrap">
                            @forelse($relatedPost as $post)
                                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                                    <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg">
                                        @if (file_exists(public_path($post->thumbnail)))
                                            <img class="w-full" src="{{ asset($post->thumbnail) }}"
                                                alt="{{ $post->title }}">
                                        @else
                                            <img class="w-full" src="http://via.placeholder.com/360x200"
                                                alt="{{ $post->title }}">
                                        @endif
                                        <div class="py-8 px-6">
                                            <h3>
                                                <a class="mb-3 block text-xl font-semibold text-dark hover:text-primary"
                                                    href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <p class="mb-6 text-base font-medium text-secondary">
                                                {{ Str::limit($post->description, 50) }}
                                            </p>
                                            <a class="flex justify-center rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white hover:opacity-80"
                                                href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">Baca
                                                Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full px-4">
                                    <p class="mb-6 text-base font-medium text-secondary sm:text-center">
                                        Belum ada artikel terkait
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
