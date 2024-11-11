<x-guest-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7 w-full">berita desa</h1>
    <div class="my-5 mx-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-3">
            @foreach ($informasi as $data)
                <div class="card w-full bg-base-100 shadow-xl">
                    <figure class="px-2 pt-2 h-32">
                        <img src="{{ asset($data->gambar) }}" alt="Shoes"
                            class="rounded-xl" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title truncate">{{$data->judul}}</h2>
                        <p class="line-clamp-3">{{$data->berita}}</p>
                        <div class="card-actions w-full">
                            <a href="{{ route('informasi-detail', ['id' => $data->id]) }}" class="btn btn-primary w-full">Lihat Berita</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
