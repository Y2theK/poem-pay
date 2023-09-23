<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{-- line awesome --}}
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased text-sm md:text-md">
    <div class="min-h-screen bg-gray-100">
        {{-- @include('frontend.layouts.navigation') --}}
        <!-- Top Menu -->
        <nav class="bg-white border-b border-gray-100 sticky top-0">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center justify-center font-bold">
                        <!-- Logo -->
                        @if (request()->routeIs('home'))
                            <div class="shrink-0  w-8">
                                <a href="{{ route('home') }}">
                                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                                </a>
                            </div>
                        @else
                            <!-- Logo -->
                            <div class="shrink-0  w-8 back-btn">
                                <i class="las la-angle-left text-xl  text-purple-600"></i>
                            </div>
                        @endif


                        <div class="px-3">@yield('title')</div>

                    </div>


                    <!-- Notification Bell -->
                    <div class="mr-4 flex items-center ">
                        <a href="{{ route('notifications') }}"
                            class="inline-flex items-center relative  justify-center p-0 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="w-6 h-6 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.31317 12.463C6.20006 9.29213 8.60976 6.6252 11.701 6.5C14.7923 6.6252 17.202 9.29213 17.0889 12.463C17.0889 13.78 18.4841 15.063 18.525 16.383C18.525 16.4017 18.525 16.4203 18.525 16.439C18.5552 17.2847 17.9124 17.9959 17.0879 18.029H13.9757C13.9786 18.677 13.7404 19.3018 13.3098 19.776C12.8957 20.2372 12.3123 20.4996 11.701 20.4996C11.0897 20.4996 10.5064 20.2372 10.0923 19.776C9.66161 19.3018 9.42346 18.677 9.42635 18.029H6.31317C5.48869 17.9959 4.84583 17.2847 4.87602 16.439C4.87602 16.4203 4.87602 16.4017 4.87602 16.383C4.91795 15.067 6.31317 13.781 6.31317 12.463Z"
                                    stroke="#9333ea" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.42633 17.279C9.01212 17.279 8.67633 17.6148 8.67633 18.029C8.67633 18.4432 9.01212 18.779 9.42633 18.779V17.279ZM13.9757 18.779C14.3899 18.779 14.7257 18.4432 14.7257 18.029C14.7257 17.6148 14.3899 17.279 13.9757 17.279V18.779ZM12.676 5.25C13.0902 5.25 13.426 4.91421 13.426 4.5C13.426 4.08579 13.0902 3.75 12.676 3.75V5.25ZM10.726 3.75C10.3118 3.75 9.97601 4.08579 9.97601 4.5C9.97601 4.91421 10.3118 5.25 10.726 5.25V3.75ZM9.42633 18.779H13.9757V17.279H9.42633V18.779ZM12.676 3.75H10.726V5.25H12.676V3.75Z"
                                    fill="#9333ea" />

                            </svg>
                            @if ($unread_noti_count)
                            <div class="absolute inline-flex items-center justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 border-0 border-white rounded-full -top-0 -right-1 dark:border-gray-900" style="font-size: 10px">{{  $unread_noti_count  }}</div>
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </nav>


        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header> --}}

        <!-- Page Content -->
        <main class="p-5">
            {{ $slot }}
        </main>

        {{-- Button menu from flowbite --}}
        <div class="flex justify-center mt-36 text-xs">
            <div
                class="fixed bottom-0 border rounded-full hover:rounded-full  left-auto z-50 w-full h-16 max-w-lg  bg-white border-t mb-1  border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <div class="grid h-full max-w-lg grid-cols-5 mx-auto font-medium">
                    <a type="button" href="{{ route('home') }}"
                        class="inline-flex  rounded-full flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        <span
                            class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500">Home</span>
                    </a>
                    <a type="button" href="{{ route('wallet') }}"
                        class="inline-flex rounded-full flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                            <path
                                d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                        </svg>
                        <span
                            class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500">Wallet</span>
                    </a>
                    <a type="button" href="{{ route('scan_and_pay') }}"
                        class="inline-flex rounded-full flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 {{ areActiveRoutes(['scan_and_pay'], 'text-purple-600') }} text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M4,4h6v6H4V4M20,4v6H14V4h6M14,15h2V13H14V11h2v2h2V11h2v2H18v2h2v3H18v2H16V18H13v2H11V16h3V15m2,0v3h2V15H16M4,20V14h6v6H4M6,6V8H8V6H6M16,6V8h2V6H16M6,16v2H8V16H6M4,11H6v2H4V11m5,0h4v4H11V13H9V11m2-5h2v4H11V6M2,2V6H0V2A2,2,0,0,1,2,0H6V2H2M22,0a2,2,0,0,1,2,2V6H22V2H18V0h4M2,18v4H6v2H2a2,2,0,0,1-2-2V18H2m20,4V18h2v4a2,2,0,0,1-2,2H18V22Z" />
                        </svg>

                        <span
                            class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['scan_and_pay'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">Scan</span>
                    </a>
                    <a type="button" href="{{ route('transactions') }}"
                        class="inline-flex rounded-full flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-6 h-6 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['transactions','transactions.detail'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 10H20L16 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16 14L4 14L8 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span
                            class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['transactions','transactions.detail'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">Transactions</span>
                    </a>
                    <a type="button" href="{{ route('profile') }}"
                        class="inline-flex rounded-full flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <span
                            class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">Profile</span>
                    </a>

                </div>
            </div>

        </div>

    </div>
    <!-- jQuery -->
    <script  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- sweetalert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- flowbit js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    {{-- jscroll cdn --}}
    {{-- <script src="//unpkg.com/jscroll/dist/jquery.jscroll.min.js"></script> --}}
    <script src="{{ asset('js/jscroll.min.js') }}"></script>


    @yield('script')
    <script type="text/javascript">
   
        $('.back-btn').on('click', function() {
            window.history.go(-1);
            return false;
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        	//setup csrf token for all ajax requests
        let token = document.head.querySelector('meta[name="csrf-token"]');

        if(token){
            $.ajaxSetup({
                headers : {
                    'X_CSRF_TOKEN' : token.content
                }
            });
        }
        @if (session('created'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('created') }}'
            })
        @elseif (session('updated'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('updated') }}'
            })
        @endif
    </script>
    {{-- <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script> --}}


</body>

</html>
