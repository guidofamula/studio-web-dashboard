<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a class=" text-lg text-primary block py-6 font-bold" href="{{ route('landing.home') }}">GUIDOFAMULA</a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                </button>
                <nav id="nav-menu"
                    class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full transition duration-300 ease-in-out lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none ">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out"
                                href="/#home">HOME</a>
                        </li>
                        <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out"
                                href="/#about">ABOUT</a>
                        </li>
                        <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out"
                                href="/#portfolio">PORTFOLIO</a>
                        </li>
                        <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out"
                                href="/#clients">CLIENTS</a>
                        </li>
                        <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out"
                                href="/#blog">BLOG</a>
                        </li>
                        <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out"
                                href="/#contact">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
