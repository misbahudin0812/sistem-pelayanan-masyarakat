<x-admin-layout>
    <h1 class="text-2xl font-bold">Profil Desa</h1>
    {{-- <a href="{{ route('tambah.masyarakat') }}" class="btn btn-sm btn-success my-3"><span class="fa fa-plus"></span>Tambah profile</a> --}}


<div class="relative overflow-y shadow-md sm:rounded-lg">
    <table class="w-full overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-fixed" id="">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-2" width="10%">
                    Kolom
                </th>
                <th scope="col" class="px-6 py-2" width="40%">
                    Isi
                </th>
                <th scope="col" class="px-6 py-2" width="5%">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div>Tentang Desa</div>
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div class="truncate">{{ $profile->tentang_desa }}</div>
                </td>
                <td class="px-6 py-2" rowspan="5">
                    <div class="join lg:join-horizontal">
                        <a href="{{ route('edit.profile', ['id' => $profile->id]) }}"
                            class="btn join-item btn-sm btn-info">Edit</a>
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div>Link Gambar</div>
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div class="truncate">{{ $profile->gambar }}</div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div>Link Peta</div>
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div class=" truncate">{{ $profile->link_peta }}</div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div>Visi</div>
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div class="truncate">{{ $profile->visi }}</div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div>Misi</div>
                </td>
                <td scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white">
                    <div class="truncate">{{ $profile->misi }}</div>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
</x-admin-layout>
