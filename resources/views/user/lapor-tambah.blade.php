<x-guest-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7 text-center">Lapor !</h1>
    <div class="container mx-auto bg-base-100 p-4 rounded mt-2" style="width: 78vw">
        <form method="POST" action="{{ route('tambah.pengaduan') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-x-3 items-top">
                <div class="w-full">
                    <!-- Name -->
                    <div>
                        <x-input-label for="perihal" :value="__('Perihal Laporan')" />
                        <x-text-input id="perihal" class="block mt-1 w-full" type="text" name="perihal"
                            :value="old('perihal')" required autofocus autocomplete="perihal"/>
                        <x-input-error :messages="$errors->get('perihal')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="detail" :value="__('Detail Laporan')" />
                        <textarea name="detail" class="textarea textarea-bordered mt-1 w-full" id="detail" rows="3" required></textarea>
                        <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="tgl_pengaduan" :value="__('Tanggal Kejadian')" />
                        <div class="relative w-full mt-2">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date"
                                name="tgl_pengaduan"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="mt-4">
                            <x-input-label for="lokasi" :value="__('Lokasi Kejadian')" />
                            <textarea name="lokasi" class="textarea textarea-bordered mt-1 w-full" id="lokasi" rows="3" required></textarea>
                            <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                        </div>

                        <x-input-error :messages="$errors->get('tgl_pengaduan')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="lampiran" :value="__('Lampiran')" />
                        <input name="lampiran"
                            class="file-input file-input-bordered mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="lampiran" type="file" accept=".jpg, .jpeg, .png">
                        <x-input-error :messages="$errors->get('lampiran')" class="mt-2" />
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
        document.getElementById('gambar').addEventListener('change', function(event) {
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
                if (file.size > 2000000) {
                    filePreview.innerHTML = `
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Ukuran filenya terlalu besar, batas maximum 2MB</span>
                        </div>
                    `
                } else {
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
</x-guest-layout>
