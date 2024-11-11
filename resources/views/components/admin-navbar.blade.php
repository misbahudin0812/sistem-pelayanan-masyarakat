<div class="navbar bg-blue-900 fixed z-10">
    <div class="container">
        <div class="w-3/12 text-center flex justify-between">
            <a class="btn btn-ghost text-xl uppercase text-white"></a>
            <x-application-logo></x-application-logo>
        </div>
        <div class="w-9/12 text-right">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component"
                            src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Profile
                        </a>
                    </li>
                    <li><form method="POST" action="{{ route('logout') }}" style="width: 100%">
                        @csrf

                        <a :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="btn btn-sm btn-error" style="width: 100%">
                            {{ __('Log Out') }}
                        </a>
                    </form></li>
                </ul>
            </div>
        </div>
    </div>
</div>
