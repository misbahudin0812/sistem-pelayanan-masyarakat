<x-admin-layout>
    <h1 class="text-2xl font-bold">Pengaduan</h1>
    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="w-full overflow-x-auto">
                    <table class="w-full" id="table">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Tanggal Pengaduan</th>
                                <th class="px-4 py-3">Perihal</th>
                                <th class="px-4 py-3">Lampiran</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pengaduan as $data)
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">{{ $no }}</td>
                                    <td class="px-4 py-3">
                                        <p class="text-xs">{{ $data->tgl_pengaduan }}</p>
                                    </td>
                                    <td class="px-4 py-3">
                                        <p class="text-xs">{{ $data->perihal }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <div class="relative hidden w-12 h-12 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded"
                                                src="{{ asset($data->lampiran) }}" alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if ($data->status == 1)
                                            <a href="{{ route('ganti.pengaduan', ['id' => $data->id, 'status' => 2]) }}"
                                                class="btn btn-sm btn-info">Terima Aduan</a>
                                        @endif
                                        @if ($data->status == 2)
                                            <a href="{{ route('ganti.pengaduan', ['id' => $data->id, 'status' => 3]) }}"
                                                class="btn btn-sm btn-success">Selesaikan Aduan</a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
