<x-admin-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-4 text-center">Tambah Data</h1>
    <div class="container mx-5 bg-base-100 p-5 rounded mt-4" style="width: 78vw">
        <form method="POST" action="{{ route('tambah.masyarakat') }}">
            @csrf
            <div class="grid grid-cols-2 gap-x-3 items-top">
                <div class="w-full">
                    <!-- Name -->
                    <div>
                        <x-input-label for="nik" :value="__('NIK')" />
                        <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik"
                            :value="old('nik')" required autofocus autocomplete="nik" />
                        <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="nohandphone" :value="__('No. Handphone')" />
                        <x-text-input id="nohandphone" class="block mt-1 w-full" type="text" name="nohandphone"
                            :value="old('nohandphone')" required autocomplete="nohandphone" />
                        <x-input-error :messages="$errors->get('nohandphone')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="alamat" :value="__('Alamat')" />
                        <textarea id="alamat" class="block textarea textarea-bordered mt-1 w-full" type="text" name="alamat"
                            :value="old('alamat')" required autocomplete="alamat"></textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full">
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Simpan') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-admin-layout>
