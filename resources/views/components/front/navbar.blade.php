<nav class="bg-white border-gray-200 px-4 lg:p-6 py-2.5">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
        <x-logo />
        <div class="flex items-center lg:order-2">

            @if (!Auth::check())
                <a href="{{ route('auth.signin') }}"
                    class="text-gray-800 hidden sm:block hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">
                    Log in
                </a>
                <a href="{{ route('auth.signup') }}"
                    class="text-white bg-primary hover:bg-hover focus:ring-4 focus:ring-dark_ring font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none duration-300 ease-in-out transition-all">
                    Get started
                </a>
            @else
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Storage::url(Auth::user()->avatar) }}"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900">{{ Str::limit(Auth::user()->name, 30) }}</span>
                        <span class="block text-sm text-gray-500 truncate">
                            {{ Str::limit(Auth::user()->email, 30) }}
                        </span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button
                                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                                    Sign out
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
            @endif

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 pl-3 pr-4 font-semibold text-gray-700 rounded lg:bg-transparent lg:hover:text-primary lg:p-0 {{ Route::is('home') ? 'bg-primary lg:text-primary text-white' : '' }}"
                        aria-current="page">Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('front.categories.index') }}"
                        class="block py-2 pl-3 pr-4 font-semibold text-gray-700 rounded lg:bg-transparent lg:hover:text-primary lg:p-0 {{ Route::is('front.categories.index') ? 'bg-primary lg:text-primary text-white' : '' }}">Categories
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary lg:p-0">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Jobs</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Help</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
