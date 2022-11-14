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
                <h1 class="pt-10 font-body text-3xl font-semibold text-primary sm:text-4xl md:text-5xl ">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center pt-5 md:pt-10">
                    <div>
                        <img src="{{ asset('assets/images/guido-profil-2.png') }}"
                            class="h-20 w-20 rounded-full border-2 border-grey-70 shadow" alt="author image" />
                    </div>
                    <div class="pl-5">
                        <span class="block font-body text-xl font-semibold text-dark">
                            By Guido Famula
                        </span>
                        <span class="block pt-1 font-body text-xl text-secondary text-grey-30">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                {{-- Start thumbnail --}}
                <div class="bg-white rounded-xl mt-5 shadow-lg overflow-hidden mb-5">
                    @if (file_exists(public_path($post->thumbnail)))
                        <img class="w-full" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                    @else
                        <img class="w-full" src="http://via.placeholder.com/360x200" alt="{{ $post->title }}">
                    @endif
                </div>
                {{-- End Thumbnail --}}
                <div class="border-t-2 mt-4">
                    <div class="flex pt-4">
                        @foreach ($categories as $category)
                            <a href="{{ route('landing.post-category', ['slug' => $category->slug]) }}"
                                class="rounded-xl bg-primary px-4 py-1 mr-1 mt-4 font-body font-bold text-white hover:bg-grey-20">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="prose max-w-none pt-8">
                {{-- Start content --}}
                <div class="font-medium text-base text-slate-700 mb-6 lg:text-lg">
                    {!! $post->content !!}
                </div>
                {{-- End content --}}

                {{-- Tag start --}}
                <h4 class="font-bold uppercase text-primary text-lg mb-3 mt-10">
                    <span class="text-dark">Tag: </span>
                    {{ $post->title }}
                </h4>
                <div class="flex pt-3">
                    @foreach ($tags as $tag)
                        <a href="/"
                            class="rounded-xl bg-primary px-4 mr-1 py-1 font-body font-bold text-white hover:bg-grey-20">
                            #{{ $tag->title }}
                        </a>
                    @endforeach
                </div>
                {{-- Tag End --}}

                {{-- Previous & next post --}}
                <div class="mt-10 flex justify-between border-t border-lila py-12">
                    <a href="/" class="flex items-center">
                        <i class="bx bx-left-arrow-alt text-2xl text-primary"></i>
                        <span class="block pl-2 font-body text-lg font-bold uppercase text-primary md:pl-5">Previous
                            Post</span>
                    </a>
                    <a href="/" class="flex items-center">
                        <span class="block pr-2 font-body text-lg font-bold uppercase text-primary md:pr-5">Next
                            Post</span>
                        <i class="bx bx-right-arrow-alt text-2xl text-primary"></i>
                    </a>
                </div>
                {{-- Previous & next post --}}

                <div
                    class="flex flex-col items-center border-t border-lila py-12 pt-12 md:flex-row md:items-start xl:pb-20">
                    <div class="w-3/4 sm:w-2/5 lg:w-1/4 xl:w-1/5">
                        <img src="{{ asset('assets/images/guido-profil-2.png') }}" class="border-t-2 rounded-full shadow"
                            alt="Guido Famula" />
                    </div>
                    <div class="ml-0 text-center md:ml-10 md:w-5/6 md:text-left">
                        <h3 class="pt-10 font-body text-2xl font-bold text-secondary md:pt-0">
                            Guido Famula
                        </h3>
                        <p
                            class="pt-5 font-body text-lg leading-8 text-secondary sm:leading-9 md:text-xl md:leading-9 lg:leading-9 xl:leading-9">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia asperiores quam ipsam
                            laudantium eligendi nam rerum quisquam accusantium, impedit autem, porro rem ullam, maiores
                            possimus repellat voluptatibus dolor ut numquam!
                        </p>
                        <div class="flex items-center justify-center pt-5 md:justify-start">
                            {{-- Youtube icon start --}}
                            <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
                                href="#" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>YouTube</title>
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                            </a>
                            {{-- Youtube icon end --}}

                            {{-- Instagram icon start --}}
                            <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
                                href="#" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>Instagram</title>
                                    <path
                                        d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                </svg>
                            </a>
                            {{-- Instagram icon end --}}

                            {{-- Quora icon start --}}
                            <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
                                href="#" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>Quora</title>
                                    <path
                                        d="M7.3799.9483A11.9628 11.9628 0 0 1 21.248 19.5397l2.4096 2.4225c.7322.7362.21 1.9905-.8272 1.9905l-10.7105.01a12.52 12.52 0 0 1-.304 0h-.02A11.9628 11.9628 0 0 1 7.3818.9503Zm7.3217 4.428a7.1717 7.1717 0 1 0-5.4873 13.2512 7.1717 7.1717 0 0 0 5.4883-13.2511Z" />
                                </svg>
                            </a>
                            {{-- Quora icon end --}}

                            {{-- Linkedn icon start --}}
                            <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
                                href="#" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>LinkedIn</title>
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            {{-- Linkedn icon end --}}

                            {{-- Github icon start --}}
                            <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
                                href="#" target="_blank">
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
            </div>
        </div>
    </div>
@endsection
