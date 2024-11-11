<x-admin-layout>
    <h1 class="text-2xl font-bold">Informasi Desa</h1>
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
    <a href="{{ route('tambah.informasi') }}" class="btn btn-sm btn-success my-3"><span class="fa fa-plus"></span>Tambah
        Data</a>

    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full" id="table">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Tanggal Artikel</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($informasi as $data)
                            <tr
                                class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><div class="relative hidden w-12 h-12 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded"
                                        src="{{ asset($data->gambar) }}"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div></td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{$data->judul}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight">
                                        {{$data->tgl_berita}} </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="join lg:join-horizontal">
                                        <a href="{{ route('edit.informasi', ['id' => $data->id]) }}"
                                            class="btn join-item btn-sm btn-info">Edit</a>
                                        <a href="#deleteConfirmation{{ $data->id }}"
                                            class="btn join-item btn-sm btn-error">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal" role="dialog" id="deleteConfirmation{{ $data->id }}">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">Hapus Data!</h3>
                                    <p class="py-2">Apakah anda yakin akan mengapus data {{ $data->judul }}?</p>
                                    <div class="modal-action">
                                        <form method="dialog">
                                            <!-- if there is a button in form, it will close the modal -->
                                            <a href="#" class="btn">Tidak</a>
                                        </form>
                                        <form action="{{ route('hapus.informasi', ['id' => $data->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button>
                                                {{ __('Hapus Data') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
