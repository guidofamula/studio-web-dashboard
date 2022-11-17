<section id="contact" class="pt-36 pb-32">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="text-lg font-semibold text-primary mb-2">Contact</h4>
                <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">Kirim Pesan</h2>
                <p class="font-medium text-md text-secondary md:text-lg">Formulir dibawah bukan fitur berlangganan,
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
            <div class="w-full lg:w-2/3 lg:mx-auto">
                <div class="w-full px-4 mb-8">
                    <label for="name" class="text-base font-bold text-primary">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Tuliskan nama lengkap..."
                        class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary @error('name') is-invalid @enderror" />
                    @error('name')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="w-full px-4 mb-8">
                    <label for="email" class="text-base font-bold text-primary">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Tuliskan email aktif..."
                        class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary @error('email') is-invalid @enderror" />
                    @error('email')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="w-full px-4 mb-8">
                    <label for="message" class="text-base font-bold text-primary">Pesan</label>
                    <textarea id="message" name="message" placeholder="Tuliskan apa yang ingin kamu sampaikan..."
                        class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary h-32"
                        @error('message') is-invalid @enderror>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Start display reCaptcha --}}
                <div class="container">
                    <div class="flex mx-auto justify-center sm:w-full mb-5">
                        {!! NoCaptcha::display() !!}
                    </div>
                    <div class="invalid-feedback text-red-600 flex mx-auto justify-center sm:w-full mb-5">
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
                        class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">
                        Kirim
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
