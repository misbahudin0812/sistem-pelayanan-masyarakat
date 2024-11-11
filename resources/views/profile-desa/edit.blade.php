<x-admin-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-2 text-center">Edit Data</h1>
    <div class="container mx-5 bg-base-100 p-5 rounded mt-2" style="width: 78vw">
        {{-- {{$profile}} --}}
        <form method="POST" action="{{ route('update.profile', ['id' => $profile->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="grid grid-cols-2 gap-x-3 items-top">
                <div class="w-full">
                    <!-- Name -->
                    <div class="">
                        <x-input-label for="tentang_desa" :value="__('Tentang Desa')" />
                        <textarea name="" id="" cols="30" rows="10" class="hidden"></textarea>
                        <textarea name="tentang_desa" class="textarea textarea-bordered mt-1 w-full" id="tentang_desa" rows="3" required>{{$profile->tentang_desa}}</textarea>
                        <x-input-error :messages="$errors->get('tentang_desa')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="visi" :value="__('Visi')" />
                        <textarea name="" id="" cols="30" rows="10" class="hidden"></textarea>
                        <textarea name="visi" class="textarea textarea-bordered mt-1 w-full" id="visi" rows="3" required>{{$profile->visi}}</textarea>
                        <x-input-error :messages="$errors->get('visi')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="misi" :value="__('Misi')" />
                        <textarea name="" id="" cols="30" rows="10" class="hidden"></textarea>
                        <textarea name="misi" class="textarea textarea-bordered mt-1 w-full" id="misi" rows="3" required>{!!$profile->misi!!}</textarea>
                        <x-input-error :messages="$errors->get('misi')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full">
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="link_peta" :value="__('Link Peta')" />
                        <textarea name="" id="" cols="30" rows="10" class="hidden"></textarea>
                        <textarea name="link_peta" class="textarea textarea-bordered mt-1 w-full" id="link_peta" rows="3" required>{{$profile->link_peta}}</textarea>
                        <x-input-error :messages="$errors->get('link_peta')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="gambar" :value="__('Foto')" />
                        <input name="gambar" class="file-input file-input-bordered mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="gambar" type="file" accept=".jpg, .jpeg, .png">
                        <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                    </div>
                    <div id="filePreview" class="mt-3"></div>
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        // Menangani perubahan pada input file
        document.getElementById('gambar').addEventListener('change', function (event) {
            var fileInput = event.target;
            var file = fileInput.files[0];
    
            // Menampilkan pratinjau file
            showFilePreview(file);
        });
    
        // Fungsi untuk menampilkan pratinjau file
        function showFilePreview(file) {
            var filePreview = document.getElementById('filePreview');
    
            // Membersihkan pratinjau sebelumnya
            filePreview.innerHTML = '';
    
            if (file) {
                if(file.size > 2000000){
                    filePreview.innerHTML = `
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Ukuran filenya terlalu besar, batas maximum 2MB</span>
                        </div>
                    `
                }else{
                    // Membuat elemen gambar untuk pratinjau
                    var img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = 'File Preview';
                    img.style.maxWidth = '100%';
        
                    // Menambahkan elemen gambar ke pratinjau
                    filePreview.appendChild(img);
                }
            }
        }
    </script>
</x-admin-layout>
