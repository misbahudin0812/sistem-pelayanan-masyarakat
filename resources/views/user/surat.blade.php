<x-guest-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7 text-center">Layanan Surat</h1>
    <div class="container mx-6">
        <a href="{{ route('tambah-surat') }}" class="btn btn-active btn-primary">Ajukan Surat <span
                class="fa-solid fa-plus"></span></a>
        <a href="{{ route('download-surat') }}" class="btn btn-outline btn-success ms-3">Download Surat <span
                class="fa-solid fa-plus"></span></a>
        @foreach ($surat as $item)
            @foreach (config('app.selectJenisSurat') as $data)
                @php
                    $dataCari = '';
                    if ($data['value'] ==  $item->jenis_surat) {
                        $dataCari = $data['label'];
                        break;
                    } else {
                        $dataCari = '';
                    }
                @endphp
            @endforeach
            <div role="alert" class="alert shadow-lg mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h3 class="font-bold">{{  $dataCari }}</h3>
                    <div class="text-xs">{{ $item->tgl_surat }}</div>
                </div>
                <span
                    class="ms-auto bg-blue-100 text-blue-800 text-md font-medium me-2 p-2 inline-block rounded dark:bg-blue-900 dark:text-blue-300">{{ $item->status == 1 ? 'Diajukan' : 'Terbit' }}</span>
            </div>
        @endforeach
    </div>
</x-guest-layout>
