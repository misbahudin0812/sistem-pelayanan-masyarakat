<x-guest-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7 text-center">Bagan Perangkat desa</h1>
    <div class="hero">
        <div class="hero-content flex-col md:flex-row items-start justify-between h-full">
            <!-- <div class="shadow-2xl p-2 rounded min-h-96"> -->
            <div class="w-full md:w-6/12">
                <div class=" shadow-2xl p-2 rounded min-h-96 bg-base-100">
                    <img src="{{ asset('images/bagan.webp') }}" alt="" class="w-full">
                </div>
            </div>
            <div class="w-full md:w-6/12">
                <div class=" shadow-2xl p-2 rounded min-h-96 bg-base-100">
                    <h1 class="text-2xl font-bold px-4 text-center">Pegawai Desa</h1>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-3">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full" id="table">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        {{-- <th class="px-4 py-3">NIP</th> --}}
                                        <th class="px-4 py-3">Nama Lengkap</th>
                                        <th class="px-4 py-3">Jabatan</th>
                                        {{-- <th class="px-4 py-3">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($staff as $data)
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="{{ asset($data->gambar) }}"
                                                            alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{$data->nama}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    {{$data->jabatan}} </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
