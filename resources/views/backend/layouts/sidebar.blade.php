  <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold flex items-end text-gray-800 dark:text-gray-200" href="{{ route('admin.home') }}">
                <div class="shrink-0 w-8 mr-4">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </div>
                <div>{{ config('app.name') }} </div>
                </a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 {{ areActiveRoutes(['admin.home']) }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.home') }}">
                            <i class="las la-tachometer-alt text-2xl"></i>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                     <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.users.index','admin.users.create','admin.users.edit']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.users.index') }}">
                            <i class="las la-user-friends text-xl"></i>
                            <span class="ml-4">Users</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.posts.index','admin.posts.create','admin.posts.edit']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.posts.index') }}">
                            <i class="las la-user-friends text-xl"></i>
                            <span class="ml-4">Posts</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.wallets.index']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.wallets.index') }}">
                            <i class="las la-wallet text-xl"></i>
                            <span class="ml-4">Wallets</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.transactions.index']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.transactions.index') }}">
                            <i class="las la-exchange-alt text-xl"></i>
                            <span class="ml-4">Transactions</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.staffs.index','admin.staffs.create','admin.staffs.edit']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.staffs.index') }}">
                            <i class="las la-user-lock text-xl"></i>
                            <span class="ml-4">Staffs</span>
                        </a>
                    </li>
                </ul>
                
            </div>
        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside
            class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
            x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
            @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold flex items-end text-gray-800 dark:text-gray-200" href="{{ route('admin.home') }}">
                    <div class="shrink-0 w-8 mr-4">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </div>
                    <div> Poem Pay </div>
                </a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 {{ areActiveRoutes(['admin.home']) }} rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.home') }}">
                            <i class="las la-tachometer-alt text-2xl"></i>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.users.index','admin.users.create','admin.users.edit']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.users.index') }}">
                            <i class="las la-user-friends text-xl"></i>
                            <span class="ml-4">Users</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.posts.index','admin.posts.create','admin.posts.edit']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.posts.index') }}">
                            <i class="las la-user-friends text-xl"></i>
                            <span class="ml-4">Posts</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.wallets.index']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.wallets.index') }}">
                            <i class="las la-wallet text-xl"></i>
                            <span class="ml-4">Wallets</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.transactions.index']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.transactions.index') }}">
                            <i class="las la-exchange-alt text-xl"></i>
                            <span class="ml-4">Transactions</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg {{ areActiveRoutes(['admin.staffs.index','admin.staffs.create','admin.staffs.edit']) }}" 
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('admin.staffs.index') }}">
                            <i class="las la-user-lock text-xl"></i>
                            <span class="ml-4">Staffs</span>
                        </a>
                    </li>
                   
                </ul>
                <div class="px-6 my-6">

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                    <button  onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Admin Log Out') }}
                    </button>
                </form>
                </div>
            </div>
        </aside>
        