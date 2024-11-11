<x-guest-layout>
    @if (session('status'))
        <div id="toast-success" class=" absolute right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{session('status')}}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const toastElement = document.getElementById('toast-success');
                if (toastElement) {
                    toastElement.remove();
                }
            }, 1000);
        });
        </script>
    @endif
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7">about us</h1>
    <div class="hero">
        <div class="hero-content flex-col-reverse lg:flex-row items-start justify-between">
            <!-- <div class="shadow-2xl p-2 rounded min-h-96"> -->
            <div class="md:w-7/12 shadow-2xl p-2 rounded min-h-96 w-full bg-base-100">
                <h1 class="text-2xl font-bold px-4">Deskripsi</h1>
                <p class="py-2 px-4">{{$profile->tentang_desa}}</p>
            </div>
            <!-- <img src="https://scontent.fcgk18-2.fna.fbcdn.net/v/t39.30808-6/242877890_220570553448652_7680682074254948053_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=Fd80730Zs94AX9ie3Xh&_nc_ht=scontent.fcgk18-2.fna&oh=00_AfCoKhEU_ufSa-9B35yFkiV2KWj6xZkgshckmOy4YGEWBA&oe=6589D46E" class="object-cover max-w-lg max-h-96 rounded-lg shadow-2xl" /> -->
            <img src="{{ asset($profile->gambar)}}" class="object-cover md:w-6/12 max-w-lg max-h-96 rounded-lg shadow-2xl w-full" />
        </div>
    </div>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7">Feature</h1>
    <div class="hero mb-4">
        <div class="hero-content flex-col lg:flex-row items-start justify-between w-full">
            <div class="card w-full lg:w-4/12 bg-base-100 shadow-xl">
                <figure class="px-10 pt-10">
                    <i class="fa-solid fa-bullhorn fa-3x"></i>
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Pengaduan</h2>
                    <div class="card-actions">
                        <a href="{{ route('lapor') }}" class="btn btn-primary">Lapor Pengaduan</a>
                    </div>
                </div>
            </div>
            <div class="card w-full lg:w-4/12 bg-base-100 shadow-xl">
                <figure class="px-10 pt-10">
                    <i data-feather="mail" stroke-width="3" width="50" height="50"></i>
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Persuratan</h2>
                    <div class="card-actions">
                        <a href="{{ route('surat') }}" class="btn btn-primary">Pengajuan Surat</a>
                    </div>
                </div>
            </div>
            <div class="card w-full lg:w-4/12 bg-base-100 shadow-xl">
                <figure class="px-10 pt-10">
                    <i class="fa-solid fa-people-group fa-3x"></i>
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Kepegawaian</h2>
                    <div class="card-actions">
                        <a href="{{ route('perangkat-desa') }}" class="btn btn-primary">Lihat Perangkat Desa</a>
                    </div>
                </div>
            </div>
            <div class="card w-full lg:w-4/12 bg-base-100 shadow-xl">
                <figure class="px-10 pt-10">
                    <i data-feather="info" stroke-width="3" width="50" height="50"></i>
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Informasi</h2>
                    <div class="card-actions">
                        <a href="{{ route('informasi-desa') }}" class="btn btn-primary">Lihat Informasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (async () => {
        await new Promise(resolve => {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', resolve);
            } else {
                resolve();
            }
        });

        const toaster = document.querySelector('[x-data="{ show: true }"]');

        if (toaster) {
            toaster.classList.remove('hidden');
            setTimeout(() => {
                toaster.classList.add('hidden');
            }, 5000);
        }
    })();
    </script>
</x-guest-layout>