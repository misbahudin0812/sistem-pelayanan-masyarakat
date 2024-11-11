<x-admin-layout>
    <h1 class="text-5xl font-bold">Selamat datang kembali, {{$user->name}}</h1>
            <p class="py-6">Jangan lupa periksa selalu pengajuan surat dan pengaduan dari masyarakat tercinta</p>
            <a href="{{route('admin.surat')}}" class="btn btn-primary">Cek Surat</a>
            <a href="{{route('admin.pengaduan')}}" class="btn btn-primary">Cek Pengaduan</a>
</x-admin-layout>