<div class="container mt-5">
    <div class="relative flex items-center justify-center">
        <div class="flex items-center px-6">
            <nav id="nav-menu"
                class="right-4 top-full w-full py-5 transition duration-300 ease-in-out lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none">
                <ul class="block lg:flex">
                    <li class="group">
                        <a class="mx-8 mt-2 flex justify-center rounded-lg bg-primary py-2 px-4 text-lg font-medium text-white transition duration-300 ease-in-out hover:opacity-80 group-hover:text-dark"
                            href="{{ route('landing.blog') }}">Semua Postingan</a>
                    </li>
                    <li class="group">
                        <a class="mx-8 mt-2 flex justify-center rounded-lg bg-primary py-2 px-4 text-lg font-medium text-white transition duration-300 ease-in-out hover:opacity-80 group-hover:text-dark"
                            href="{{ route('landing.tags') }}">Semua Tag</a>
                    </li>
                    <li class="group">
                        <a class="mx-8 mt-2 flex justify-center rounded-lg bg-primary py-2 px-4 text-lg font-medium text-white transition duration-300 ease-in-out hover:opacity-80 group-hover:text-dark"
                            href="{{ route('landing.categories') }}">Semua Kategori</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
