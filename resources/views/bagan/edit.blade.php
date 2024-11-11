<x-admin-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 text-center">Edit Data</h1>
    <a class="mx-5 btn btn-outline" href="{{route('admin.bagan')}}">Kembali</a>
    <div class="container mx-5 bg-base-100 p-4 rounded mt-2" style="width: 78vw">
        <form method="POST" action="{{ route('edit.bagan',['id' => $staff->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="grid grid-cols-2 gap-x-3 items-top">
                <div class="w-full">
                    <!-- Name -->
                    <div>
                        <x-input-label for="nip" :value="__('NIP')" />
                        <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip"
                            value="{{$staff->nip}}" required autofocus autocomplete="nip" readonly/>
                        <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Nama Lengkap')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            value="{{$staff->nama}}" required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="jabatan" :value="__('Jabatan')" />
                        <select id="jabatan" name="jabatan"
                            class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach (config('app.selectJabatan') as $item)
                                <option value="{{$item}}" {{$staff->jabatan == $item? 'selected':''}}>{{$item}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                        <div class="flex my-2">
                            <div class="flex items-center me-4">
                                <input id="inline-radio" type="radio" value="L" name="jenis_kelamin"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{$staff->jenis_kelamin == 'L'? 'checked':''}}>
                                <label for="inline-radio"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="inline-radio" type="radio" value="P" name="jenis_kelamin"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{$staff->jenis_kelamin == 'P'? 'checked':''}}>
                                <label for="inline-radio"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full">
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
                    {{ __('Simpan') }}
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
