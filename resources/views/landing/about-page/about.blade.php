@extends('layouts.landing')

@section('title')
    About
@endsection

@section('content')
    {{-- Navhome section start --}}
    @include('landing.home-page.partials.navhome')
    {{-- Navhome section end --}}
    <div class="bg-grey-50" id="about">
        <div class="container flex flex-col items-center py-16 md:py-20 lg:flex-row">
            <div class="w-full text-center mt-9 sm:w-3/4 lg:w-3/5 lg:text-left">
                <h2 class="font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                    Perkenalkan...
                </h2>
                <h4 class="pt-6 font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                    Saya Guido Famula, Sebagai Web Programmer
                </h4>
                <p class="pt-6 font-body leading-relaxed text-grey-20">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit anim id est laborum.
                </p>
                <div class="flex flex-col justify-center pt-6 sm:flex-row lg:justify-start">
                    <div class="flex items-center justify-center sm:justify-start">
                        <p class="font-body text-lg font-semibold uppercase text-grey-20">
                            Terhubung Dengan Saya
                        </p>
                        <div class="hidden sm:block pl-3">
                            <i class="fas fa-solid fa-chevron-right text-primary"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0">
                        {{-- Youtube icon start --}}
                        <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
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
                        <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
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
                        <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
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
                        <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
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
                        <a class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white transition duration-300 ease-in-out"
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
            {{-- Profil about start --}}
            <div class="relative mt-10 lg:mt-9 lg:right-0 lg:pl-20">
                <div class="rounded-full border-primary shadow-xl">
                    <img src="{{ asset('assets/images/guido-profil.png') }}" class="rounded-full max-w-xs mx-auto"
                        alt="author" />
                </div>
            </div>
            {{-- Profil about end --}}
        </div>
    </div>

    <div class="container py-16 md:py-20" id="services">
        <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
            Here's what I'm good at
        </h2>
        <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
            These are the services Ioffer
        </h3>

        <div class="grid grid-cols-1 gap-6 pt-10 sm:grid-cols-2 md:gap-10 md:pt-12 lg:grid-cols-3">
            <div class="group rounded px-8 py-12 shadow hover:bg-primary">
                <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
                    <div class="hidden group-hover:block">
                        <img src="/assets/img/icon-development-white.svg" alt="development icon" />
                    </div>
                    <div class="block group-hover:hidden">
                        <img src="/assets/img/icon-development-black.svg" alt="development icon" />
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                        WEB DEVELOPMENT
                    </h3>
                    <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            <div class="group rounded px-8 py-12 shadow hover:bg-primary">
                <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
                    <div class="hidden group-hover:block">
                        <img src="/assets/img/icon-content-white.svg" alt="content marketing icon" />
                    </div>
                    <div class="block group-hover:hidden">
                        <img src="/assets/img/icon-content-black.svg" alt="content marketing icon" />
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                        Technical Writing
                    </h3>
                    <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            <div class="group rounded px-8 py-12 shadow hover:bg-primary">
                <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
                    <div class="hidden group-hover:block">
                        <img src="/assets/img/icon-mobile-white.svg" alt="Mobile Application icon" />
                    </div>
                    <div class="block group-hover:hidden">
                        <img src="/assets/img/icon-mobile-black.svg" alt="Mobile Application icon" />
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                        Mobile Development
                    </h3>
                    <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            <div class="group rounded px-8 py-12 shadow hover:bg-primary">
                <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
                    <div class="hidden group-hover:block">
                        <img src="/assets/img/icon-email-white.svg" alt="Email Marketing icon" />
                    </div>
                    <div class="block group-hover:hidden">
                        <img src="/assets/img/icon-email-black.svg" alt="Email Marketing icon" />
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                        Email Development
                    </h3>
                    <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            <div class="group rounded px-8 py-12 shadow hover:bg-primary">
                <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
                    <div class="hidden group-hover:block">
                        <img src="/assets/img/icon-design-white.svg" alt="Theme Design icon" />
                    </div>
                    <div class="block group-hover:hidden">
                        <img src="/assets/img/icon-design-black.svg" alt="Theme Design icon" />
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                        Graphic Design
                    </h3>
                    <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
            <div class="group rounded px-8 py-12 shadow hover:bg-primary">
                <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
                    <div class="hidden group-hover:block">
                        <img src="/assets/img/icon-graphics-white.svg" alt="Graphic Design icon" />
                    </div>
                    <div class="block group-hover:hidden">
                        <img src="/assets/img/icon-graphics-black.svg" alt="Graphic Design icon" />
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                        Web Design
                    </h3>
                    <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
