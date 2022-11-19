<header class="absolute top-0 left-0 z-10 flex w-full items-center bg-transparent">
    <div class="container">
        <div class="relative flex items-center justify-between">
            <div class="px-4">
                <a class="block py-6 text-lg font-bold text-primary" href="{{ route('landing.home') }}">GUIDOFAMULA</a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
                    <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                </button>
                <nav id="nav-menu"
                    class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg transition duration-300 ease-in-out lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary"
                                href="/#home">HOME</a>
                        </li>
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary"
                                href="/#about">ABOUT</a>
                        </li>
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary"
                                href="/#portfolio">PORTFOLIO</a>
                        </li>
                        {{-- <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out"
                                href="/#clients">CLIENTS</a>
                        </li> --}}
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary"
                                href="{{ route('landing.blog') }}">BLOG</a>
                        </li>
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary"
                                href="/#contact">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
