<x-guest-layout>
    <h1 class="text-3xl font-bold uppercase ml-6 mt-7 text-center">Visi-misi desa</h1>
    <div class="hero">
        <div class="hero-content flex-col lg:flex-row items-start justify-between h-full">
            <!-- <div class="shadow-2xl p-2 rounded min-h-96"> -->
            <div class="md:w-6/12 w-full">
                <div class=" shadow-2xl p-2 rounded min-h-96 bg-base-100">
                    <h1 class="text-2xl font-bold px-4 text-center">Visi Desa</h1>
                    <p class="py-2 px-4">{{$profile->visi}}</p>
                </div>
            </div>
            <div class="md:w-6/12 w-full">
                <div class=" shadow-2xl p-2 rounded min-h-96 bg-base-100">
                    <h1 class="text-2xl font-bold px-4 text-center">Misi Desa</h1>
                    <p class="py-2 px-4">{!! nl2br($profile->misi) !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>