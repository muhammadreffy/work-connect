<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                {{ Route::is('dashboard.index') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                    {{ Route::is('dashboard.index') ? 'bg-gray-100 text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            @role('super_admin')
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                    {{ Route::is('admin.categories.index') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                    {{ Route::is('admin.categories.index') ? 'bg-gray-100 text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ms-3">Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.withdrawals') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                        {{ Route::is('admin.withdrawals') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                            {{ Route::is('admin.withdrawals') ? 'bg-gray-100 text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z"
                                clip-rule="evenodd" />
                            <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                        </svg>


                        <span class="ms-3">Withdrawals</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.topups') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                        {{ Route::is('admin.topups') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                            {{ Route::is('admin.topups') ? 'bg-gray-100 text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11 16.5a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0Zm4.5 2.5v-1.5H14v-2h1.5V14h2v1.5H19v2h-1.5V19h-2Z"
                                clip-rule="evenodd" />
                            <path d="M3.987 4A2 2 0 0 0 2 6v9a2 2 0 0 0 2 2h5v-2H4v-5h16V6a2 2 0 0 0-2-2H3.987Z" />
                            <path fill-rule="evenodd" d="M5 12a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Topups</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.tools.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                        {{ Route::is('admin.tools.index') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                            {{ Route::is('admin.tools.index') ? 'bg-gray-100 text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Tools</span>
                    </a>
                </li>
            @endrole

            @role('super_admin|client')
                <li>
                    <a href="{{ route('admin.projects.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                        {{ Route::is('admin.projects.index') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                            {{ Route::is('admin.projects.index') ? 'bg-gray-100 text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Project Listings</span>
                    </a>
                </li>
            @endrole

            @role('freelancer|client')
                <li>
                    <a href="{{ route('dashboard.wallet') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                        {{ Route::is('dashboard.wallet*') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                            {{ Route::is('dashboard.wallet*') ? 'bg-gray-100 text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ms-3">My Wallets</span>
                    </a>
                </li>
            @endrole

            @can('apply job')
                <li>
                    <a href="{{ route('dashboard.proposals') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group
                        {{ Route::is('dashboard.proposals') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900
                            {{ Route::is('dashboard.proposals') ? 'bg-gray-100 text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">My Proposals</span>
                    </a>
                </li>
            @endcan
            {{-- <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                    <span
                        class="inline-flex items-center justify-center px-2 text-sm font-medium text-gray-800 bg-gray-100 rounded-full ms-3 dark:bg-gray-700 dark:text-gray-300">Pro</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>
