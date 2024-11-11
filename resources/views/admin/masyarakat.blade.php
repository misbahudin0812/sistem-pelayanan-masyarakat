<x-admin-layout>
    <h1 class="text-2xl font-bold">Masyarakat</h1>
    <a href="{{ route('tambah.masyarakat') }}" class="btn btn-sm btn-success my-3"><span class="fa fa-plus"></span>Tambah Data</a>


<div class="relative overflow-x-auto overflow-y shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="table">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-2">
                    NIK
                </th>
                <th scope="col" class="px-6 py-2">
                    Nama Lengkap
                </th>
                <th scope="col" class="px-6 py-2">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-2 w-4">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masyarakat as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div>{{ $data->nik }}</div>
                </th>
                <td class="px-6 py-2">
                    <div class="font-bold capitalize">{{ $data->name }}</div>
                </td>
                <td class="px-6 py-2">
                    <div>{{ $data->alamat }}</div>
                </td>
                <td class="px-6 py-2">
                    <div class="join lg:join-horizontal">
                        <a href="{{ route('edit.masyarakat', ['id' => $data->id]) }}"
                            class="btn join-item btn-sm btn-info">Edit</a>
                        <a href="#deleteConfirmation{{ $data->id }}"
                            class="btn join-item btn-sm btn-error">Delete</a>
                    </div>
                </td>
            </tr>
            <div class="modal" role="dialog" id="deleteConfirmation{{ $data->id }}">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Hapus Data!</h3>
                    <p class="py-2">Apakah anda yakin akan mengapus data {{ $data->name }}?</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <a href="#" class="btn">Tidak</a>
                        </form>
                        <form action="{{ route('hapus.masyarakat', ['id' => $data->id]) }}" method="post">
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
</x-admin-layout>
