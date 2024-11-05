<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-4">
                <!-- Logo -->
                <div>
                    <a href="/" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                        <img src="\images\logo_auto2000-removebg-preview 1.png" alt="Logo">
                        <span class="font-bold">Navbar</span>
                    </a>
                </div>
                <!-- Primary Navbar items -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('models') }}"
                        class="inter font-normal py-5 px-3 text-gray-700 hover:text-gray-900">Models</a>
                    <a href="{{ route('services') }}"
                        class="inter font-normal py-5 px-3 text-gray-700 hover:text-gray-900">Services</a>
                    <a href="{{ route('promo') }}"
                        class="inter font-normal py-5 px-3 text-gray-700 hover:text-gray-900">Promosi</a>
                </div>
            </div>

            <!-- Secondary Navbar items -->
            @guest
            <div class="hidden md:flex items-center space-x-1">
                <form id="login-form" action="{{ route('login') }}" method="GET" style="display: inline;">
                    <button type="submit" class="bg-gray-600 text-white p-2.5 mt-3 flex text-center items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300">
                        <span class="text-[15px] font-bold">Login</span>
                    </button>
                </form>
            </div>
            @endguest

            @auth
            <div class="hidden md:flex items-center space-x-1">
                <img src="{{ $user->photo ? Storage::url($user->photo) : asset('images/Group.svg') }}" alt="Profile Picture" class="h-[30px] w-[30px] object-cover rounded-full">

                <img src="\images\arcticons_mapsgo.svg" alt="">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" name="customer" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span class="text-[15px] ml-4 text-black font-bold">Logout</span>
                    </button>
                </form>
            </div>
            @endauth

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">About</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Services</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Contact</a>
    </div>
</nav>
