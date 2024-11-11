<x-guest-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7 text-center">profil desa</h1>
    <div class="hero">
        <div class="hero-content flex-col lg:flex-row items-start justify-between h-full">
            <!-- <div class="shadow-2xl p-2 rounded min-h-96"> -->
            <div class="md:w-6/12 w-full">
                <div class=" shadow-2xl p-2 rounded min-h-96 bg-base-100">
                    <h1 class="text-2xl font-bold px-4 text-center">Kepala Desa</h1>
                    <div class="avatar flex justify-center mt-5">
                        <div class="w-48 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                            <img src="{{ asset($kades->gambar) }}" />
                        </div>
                    </div>
                    <p class="text-xl font-bold uppercase text-center mt-3">{{$kades->nama}}</p>
                    <div class="w-full mb-10">
                        <div class="text-3xl text-indigo-500 text-left leading-tight h-3">“</div>
                        <p class="text-sm text-center px-5">{{$profile->visi}}</p>
                        <div class="text-3xl text-indigo-500 text-right leading-tight h-3 -mt-3">”</div>
                    </div>
                </div>
                <div class="shadow-2xl p-2 rounded min-h-96 w-full bg-base-100 mt-4">
                    <h1 class="text-2xl font-bold px-4">Selayang Pandang</h1>
                    <p class="py-2 px-4">{{$profile->tentang_desa}}</p>
                </div>
            </div>
            <div class="md:w-6/12 shadow-2xl p-2 rounded min-h-96 h-full w-full bg-base-100">
                <h1 class="text-2xl font-bold px-4 text-center">Peta Desa</h1>
                <div class="w-full h-full">
                    <iframe src="{{$profile->link_peta}}" class="w-full mt-4"  style="border:0; height: 85%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>