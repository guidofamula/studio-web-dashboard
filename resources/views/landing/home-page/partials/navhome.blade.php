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
                    class="dark:shadow-bg absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg transition duration-300 ease-in-out dark:bg-dark dark:shadow-slate-700 lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none lg:dark:bg-transparent">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary dark:text-white"
                                href="/#home">HOME</a>
                        </li>
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary dark:text-white"
                                href="/#about">ABOUT</a>
                        </li>
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary dark:text-white"
                                href="/#portfolio">PORTFOLIO</a>
                        </li>
                        {{-- <li class="group">
                            <a class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white transition duration-300 ease-in-out"
                                href="/#clients">CLIENTS</a>
                        </li> --}}
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary dark:text-white"
                                href="/#blog">BLOG</a>
                        </li>
                        <li class="group">
                            <a class="mx-8 flex py-2 text-base text-dark transition duration-300 ease-in-out group-hover:text-primary dark:text-white"
                                href="/#contact">CONTACT</a>
                        </li>
                        {{-- Start Toggle dark mode --}}
                        <li class="mt-3 flex items-center pl-8 lg:mt-0">
                            <div class="flex">
                                <span class="mr-2 text-sm text-slate-500">
                                    <i class="fas fa-regular fa-sun text-xl"></i>
                                </span>
                                <input type="checkbox" class="hidden" id="dark-toggle" />
                                <label for="dark-toggle">
                                    <div
                                        class="w flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                        <div
                                            class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">

                                        </div>
                                    </div>
                                </label>
                                <span class="ml-2 text-sm text-slate-500">
                                    <i class="fas fa-solid fa-moon text-xl"></i>
                                </span>
                            </div>
                        </li>
                        {{-- End Toggle dark mode --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
