<x-admin-layout>
    <h1 class="text-2xl font-bold">Surat</h1>
    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="w-full overflow-x-auto">
                    <table class="w-full" id="table">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Tanggal Pengajuan</th>
                                <th class="px-4 py-3">Nomor Surat</th>
                                <th class="px-4 py-3">Nama Pengusul</th>
                                <th class="px-4 py-3">Jenis Surat</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($surat as $data)
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">{{ $no }}</td>
                                    <td class="px-4 py-3">
                                        <p class="text-xs">{{ $data->tgl_surat }}</p>
                                    </td>
                                    <td class="px-4 py-3">
                                    <p class="text-xs">{{ $data->nomor_surat != '' ? $data->nomor_surat : 'Belum Terbit' }}</p>
                                    </td>
                                    <td class="px-4 py-3">
                                        <p class="text-xs">{{ $data->name }}</p>
                                    </td>
                                    @foreach (config('app.selectJenisSurat') as $item)
                                        @php
                                            $dataCari = '';
                                            if ($item['value'] == $data->jenis_surat) {
                                                $dataCari = $item['label'];
                                                break;
                                            } else {
                                                $dataCari = '';
                                            }
                                        @endphp
                                    @endforeach
                                    <td class="px-4 py-3 font-semibold text-xs">
                                        <span> {{ $dataCari }} </span>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="ms-auto bg-blue-100 text-blue-800 text-md font-medium me-2 p-2 inline-block rounded dark:bg-blue-900 dark:text-blue-300">{{ $data->status == 1 ? 'Diajukan' : 'Terbit' }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if ($data->nomor_surat == '')
                                            <button class="btn btn-sm btn-success" onclick="updateConfirmation{{$data->id}}.showModal()">Terbitkan Surat</button>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                <dialog id="updateConfirmation{{ $data->id }}" class="modal">
                                    <div class="modal-box">
                                      <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                      </form>
                                      <h3 class="font-bold text-lg">Penerbitan Nomor Surat</h3>
                                      <form action="{{ route('update.surat', ['id' => $data->id]) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <div>
                                            <x-input-label for="nomor_surat" :value="__('Nomor Surat')" />
                                            <x-text-input id="nomor_surat" class="block mt-1 w-full" type="text" name="nomor_surat"
                                                required autofocus />
                                            <x-input-error :messages="$errors->get('nomor_surat')" class="mt-2" />
                                        </div>
                                        <x-primary-button class="mt-3 center">
                                            {{ __('Buat Nomor Surat') }}
                                        </x-primary-button>
                                    </form>
                                    </div>
                                  </dialog>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

</x-admin-layout>
