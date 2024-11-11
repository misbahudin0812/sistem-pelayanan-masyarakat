<x-admin-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-4 text-center">Edit Data</h1>
    <div class="container mx-5 bg-base-100 p-5 rounded mt-4" style="width: 78vw">
        {{-- {{$user}} --}}
        <form method="POST" action="{{ route('update.masyarakat', ['id' => $user->id]) }}">
            @csrf
            @method('patch')

            <div class="grid grid-cols-1 gap-x-3 items-top">
                <div class="w-full">
                    <!-- Name -->
                    <div>
                        <x-input-label for="nik" :value="__('NIK')" />
                        <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik"
                            :value="$user->nik" required autofocus autocomplete="nik" readonly/>
                        <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="$user->name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="nohandphone" :value="__('No. Handphone')" />
                        <x-text-input id="nohandphone" class="block mt-1 w-full" type="text" name="nohandphone"
                            :value="$user->nohandphone" required autocomplete="nohandphone" />
                        <x-input-error :messages="$errors->get('nohandphone')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="alamat" :value="__('Alamat')" />
                        <textarea name="" id="" cols="30" rows="10" class="hidden"></textarea>
                        <textarea name="alamat" class="textarea textarea-bordered mt-1 w-full" id="alamat" rows="3" required>{{$user->alamat}}</textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-admin-layout>
