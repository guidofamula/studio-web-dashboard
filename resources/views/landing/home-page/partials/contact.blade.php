<section id="contact" class="pt-36 pb-32 dark:bg-slate-800">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto mb-16 max-w-xl text-center">
                <h4 class="mb-2 text-lg font-semibold text-primary">Contact</h4>
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">Kirim Pesan</h2>
                <p class="text-md font-medium text-secondary md:text-lg">Formulir dibawah bukan fitur berlangganan,
                    melainkan sebatas fitur kirim pesan jika kamu yang mengunjungi laman ini membutuhkan jasa atau
                    pertanyaan seputar membangun sebuah website.<br>
                </p>
            </div>
        </div>
        @if (Session::has('success'))
            <div>
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- Render NoCaptcha --}}
        {!! NoCaptcha::renderJs() !!}

        <form action="{{ route('contact.store') }}" method="post">
            @csrf
            <div class="w-full lg:mx-auto lg:w-2/3">
                <div class="mb-8 w-full px-4">
                    <label for="name" class="text-base font-bold text-primary">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Tuliskan nama lengkap..."
                        class="@error('name') is-invalid @enderror w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:bg-slate-600 dark:text-white dark:focus:ring-white" />
                    @error('name')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-8 w-full px-4">
                    <label for="email" class="text-base font-bold text-primary">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Tuliskan email aktif..."
                        class="@error('email') is-invalid @enderror w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:bg-slate-600 dark:text-white dark:focus:ring-white" />
                    @error('email')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-8 w-full px-4">
                    <label for="message" class="text-base font-bold text-primary">Pesan</label>
                    <textarea id="message" name="message" placeholder="Tuliskan apa yang ingin kamu sampaikan..."
                        class="h-32 w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:bg-slate-600 dark:text-white dark:focus:ring-white"
                        @error('message') is-invalid @enderror>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Start display reCaptcha --}}
                <div class="container">
                    <div class="mx-auto mb-5 flex justify-center sm:w-full">
                        {!! NoCaptcha::display() !!}
                    </div>
                    <div class="invalid-feedback mx-auto mb-5 flex justify-center text-red-600 sm:w-full">
                        @if ($errors->has('recaptcha'))
                            <strong>{{ $errors->first('recaptcha') }}</strong>
                        @endif
                        {{-- @error('g-recaptcha-response')
                            <span class="invalid-feedback text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                </div>
                {{-- End display reCaptcha --}}
                <div class="w-full">
                    <button type="submit" name="send"
                        class="w-full rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-500 hover:opacity-80 hover:shadow-lg">
                        Kirim
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
