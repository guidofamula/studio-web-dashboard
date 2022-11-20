<section id="blog" class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto mb-16 max-w-xl text-center">
                <h4 class="mb-2 text-lg font-semibold text-primary">Blog</h4>
                <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl">
                    <a class="transition duration-300 ease-in-out hover:text-primary dark:text-white dark:hover:text-primary"
                        href="{{ route('landing.blog') }}" target="_blank">
                        Update Artikel
                    </a>
                </h2>
                <p class="text-md font-medium text-secondary md:text-lg">Dibawah ini merupakan artikel-artikel terbaru,
                    tampilan berdasarkan postingan terbaru, untuk melihat semua kumpulan artikel, kamu
                    bisa klik tombol <span
                        class="text-dark hover:text-primary dark:text-primary dark:hover:text-white">Lihat Semua
                        Artikel</span> yang terletak
                    dibawah
                    tampilan post ini.</p>
            </div>
        </div>
        {{-- Start card blog --}}
        <div class="flex flex-wrap">
            @forelse($posts as $post)
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-slate-800">
                        @if (file_exists(public_path($post->thumbnail)))
                            <img class="w-full" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                        @else
                            <img class="w-full" src="http://via.placeholder.com/360x200" alt="{{ $post->title }}">
                        @endif
                        <div class="py-8 px-6">
                            <h3>
                                <a class="mb-3 block text-xl font-semibold text-dark hover:text-primary dark:text-primary dark:hover:text-white"
                                    href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mb-6 text-base font-medium text-secondary">
                                {{ Str::limit($post->description, 120) }}
                            </p>
                            <a class="flex justify-center rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white hover:opacity-80"
                                href="{{ route('landing.post-detail', ['slug' => $post->slug]) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full px-4 pt-36 pb-32 text-center">
                    <h3 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl">
                        Artikel belum ada
                    </h3>
                </div>
            @endforelse
            {{-- End Card blog --}}
        </div>
        <div class="mt-10 flex justify-center">
            <a href="{{ route('landing.blog') }}"
                class="rounded-full bg-primary py-3 px-8 text-base font-semibold uppercase text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">
                Lihat Semua Artikel
            </a>
        </div>
    </div>
</section>
