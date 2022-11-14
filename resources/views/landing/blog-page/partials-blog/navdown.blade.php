<div class="container mt-5">
    <div class="flex items-center justify-center relative">
        <div class="flex items-center px-6">
            <nav id="nav-menu"
                class="py-5 w-full right-4 top-full transition duration-300 ease-in-out lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none ">
                <ul class="block lg:flex">
                    <li class="group">
                        <a class="mt-2 flex justify-center font-medium text-lg text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80 mx-8 group-hover:text-dark transition duration-300 ease-in-out"
                            href="{{ route('landing.blog') }}">Semua Postingan</a>
                    </li>
                    <li class="group">
                        <a class="mt-2 flex justify-center font-medium text-lg text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80 mx-8 group-hover:text-dark transition duration-300 ease-in-out"
                            href="{{ route('landing.tags') }}">Semua Tag</a>
                    </li>
                    <li class="group">
                        <a class="mt-2 flex justify-center font-medium text-lg text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80 mx-8 group-hover:text-dark transition duration-300 ease-in-out"
                            href="{{ route('landing.categories') }}">Semua Kategori</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
