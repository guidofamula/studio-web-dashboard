<section id="blog" class="pt-36 pb-32 bg-slate-100">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2">Blog</h4>
                <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">
                    <a class="hover:text-primary transition duration-300 ease-in-out" href="{{ route('landing.blog') }}"
                        target="_blank">
                        Artikel Terbaru
                    </a>
                </h2>
                <p class="font-medium text-md text-secondary md:text-lg">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Repudiandae, rem ratione ut minus velit quam itaque. Natus earum blanditiis
                    suscipit.</p>
            </div>
        </div>
        {{-- Start card blog --}}
        <div class="flex flex-wrap">
            @forelse($posts as $post)
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                        @if (file_exists(public_path($post->thumbnail)))
                            <img class="w-full" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                        @else
                            <img class="w-full" src="http://via.placeholder.com/360x200" alt="{{ $post->title }}">
                        @endif
                        <div class="py-8 px-6">
                            <h3>
                                <a class="block mb-3 font-semibold text-xl text-dark hover:text-primary"
                                    href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="font-medium text-base text-secondary mb-6">
                                {{ Str::limit($post->description, 120) }}
                            </p>
                            <a class="flex justify-center font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80"
                                href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="pt-36 pb-32 w-full px-4 text-center">
                    <h3 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">
                        Artikel tidak ditemukan
                    </h3>
                </div>
            @endforelse
            {{-- End Card blog --}}
        </div>
        <div class="mt-10 flex justify-center">
            <a href="{{ route('landing.blog') }}"
                class="text-base uppercase font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">
                Lihat Semua Artikel
            </a>
        </div>
    </div>
</section>
