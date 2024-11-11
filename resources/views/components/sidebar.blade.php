<div
    class="flex flex-col left-0 w-14 md:w-2/12 bg-blue-900 dark:bg-gray-900 h-screen text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col flex-grow">
        <a class="btn btn-ghost text-xl uppercase text-white">Admin</a>
        <ul class="flex flex-col py-4 space-y-1">
            <li>
                <a href="{{route('admin')}}"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.masyarakat')}}"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa fa-people-group"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Masyarakat</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.profile')}}"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa fa-landmark"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Profile Desa</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.bagan')}}"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa fa-sitemap"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Bagan Desa</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.surat')}}"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Surat</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.pengaduan')}}"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa fa-comments"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Pengaduan</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.informasi')}}"
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa fa-bullhorn"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Kelola Informasi</span>
                </a>
            </li>
        </ul>
    </div>
</div>
