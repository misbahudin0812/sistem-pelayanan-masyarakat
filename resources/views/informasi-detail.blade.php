<x-guest-layout>
    <div class="my-5 mx-4 grid grid-cols-12 gap-x-4">
        <main class="pt-8 pb-16 w-full col-span-12 lg:col-span-8 round lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <article
                    class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                                <div>
                                    <a href="#" rel="author"
                                        class="text-xl font-bold text-gray-900 dark:text-white">Admin Desa</a>
                                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                            datetime="2022-02-08" title="February 8th, 2022">{{$informasi->tgl_berita}}</time></p>
                                </div>
                            </div>
                        </address>
                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{$informasi->judul}}</h1>
                    </header>
                    <figure><img src="{{asset($informasi->gambar)}}"
                            alt="">
                    </figure>
                    <p>{!! nl2br($informasi->berita) !!}</p>
                </article>
            </div>
        </main>

        <aside aria-label="Related articles" class="py-8 col-span-12 lg:col-span-4 lg:py-12 bg-gray-50 dark:bg-gray-800">
            <div class="px-4 mx-auto max-w-screen-xl">
                <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Berita Terbaru</h2>
                <div class="grid gap-12 grid-cols-1 px-3">
                    @foreach ($news as $item)
                    <article class="max-w-xs">
                        <a href="{{route('informasi-detail', ['id' => $item->id])}}">
                            <img src="{{asset($item->gambar)}}"
                                class="mb-5 rounded-lg" alt="Image 1">
                        </a>
                        <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                            <a href="{{route('informasi-detail', ['id' => $item->id])}}">{{$item->judul}}</a>
                        </h2>
                        <p class="mb-4 text-gray-500 dark:text-gray-400 line-clamp-2">{{$item->berita}}</p>
                        <a href="{{route('informasi-detail', ['id' => $item->id])}}" class="btn btn-block btn-primary">Baca Berita</a>
                    </article>
                    @endforeach
                </div>
            </div>
        </aside>
    </div>
</x-guest-layout>
