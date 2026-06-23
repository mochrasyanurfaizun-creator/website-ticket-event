<x-guest-layout>
    <div class="min-h-screen flex bg-black text-white">

        {{-- ── Panel Kiri (branding) ── --}}
        <div class="hidden lg:flex lg:w-1/2 relative flex-col justify-between p-12
                    bg-gradient-to-br from-neutral-950 to-black border-r border-white/5">
            <div class="text-xl font-semibold tracking-[0.3em]">TIXLY</div>

            <div>
                <h1 class="font-serif text-6xl leading-tight">
                    Buat kata
                    <span class="block text-amber-200/90 italic">sandi baru.</span>
                </h1>
                <p class="mt-6 text-neutral-400 max-w-sm">
                    Pilih kata sandi yang kuat untuk mengamankan akun kamu.
                </p>
            </div>

            <div class="text-xs text-neutral-600">
                © {{ date('Y') }} TIXLY. All rights reserved.
            </div>
        </div>

        {{-- ── Panel Kanan (form) ── --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center px-6 sm:px-12">
            <div class="w-full max-w-md">

                <div class="lg:hidden text-xl font-semibold tracking-[0.3em] mb-10">TIXLY</div>

                <h2 class="font-serif text-4xl mb-2">Reset Password</h2>
                <p class="text-neutral-400 mb-10">
                    Masukkan email dan kata sandi baru kamu.
                </p>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- Email --}}
                    <div>
                        <label for="email"
                               class="block text-xs uppercase tracking-widest text-neutral-400 mb-2">
                            Email
                        </label>
                        <input id="email" name="email" type="email" required autofocus
                               autocomplete="username"
                               value="{{ old('email', $request->email) }}"
                               class="w-full bg-neutral-900/60 border border-white/10 rounded-lg px-4 py-3
                                      text-white placeholder-neutral-600
                                      focus:outline-none focus:border-amber-200/50
                                      focus:ring-1 focus:ring-amber-200/30 transition">
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password"
                               class="block text-xs uppercase tracking-widest text-neutral-400 mb-2">
                            Password Baru
                        </label>
                        <input id="password" name="password" type="password" required
                               autocomplete="new-password" placeholder="Min. 8 karakter"
                               class="w-full bg-neutral-900/60 border border-white/10 rounded-lg px-4 py-3
                                      text-white placeholder-neutral-600
                                      focus:outline-none focus:border-amber-200/50
                                      focus:ring-1 focus:ring-amber-200/30 transition">
                        @error('password')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation"
                               class="block text-xs uppercase tracking-widest text-neutral-400 mb-2">
                            Konfirmasi Password
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               autocomplete="new-password" placeholder="Ulangi kata sandi"
                               class="w-full bg-neutral-900/60 border border-white/10 rounded-lg px-4 py-3
                                      text-white placeholder-neutral-600
                                      focus:outline-none focus:border-amber-200/50
                                      focus:ring-1 focus:ring-amber-200/30 transition">
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full bg-white text-black font-medium uppercase tracking-widest
                                   py-3 rounded-lg hover:bg-amber-100 transition">
                        Reset Password
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-neutral-500">
                    Ingat kata sandi kamu?
                    <a href="{{ route('login') }}" class="text-amber-200 hover:underline">Kembali ke login</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>