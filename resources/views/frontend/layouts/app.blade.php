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
        <nav class="bg-white border-b border-gray-100 sticky top-0  z-50">

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
                                <div class="absolute inline-flex items-center justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 border-0 border-white rounded-full -top-0 -right-1 dark:border-gray-900"
                                    style="font-size: 10px">{{ $unread_noti_count }}</div>
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
                class="fixed bottom-0 border rounded-lg hover:rounded-lg  left-auto z-50 w-full h-16 max-w-lg  bg-white border-t mb-1  border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <div class="grid h-full max-w-lg grid-cols-5 mx-auto font-medium">
                    <a type="button" href="{{ route('home') }}"
                        class="inline-flex  rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        <span
                            class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500">{{ __('Home') }}</span>
                    </a>
                    <a type="button" href="{{ route('wallet') }}"
                        class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                            <path
                                d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                        </svg>
                        <span
                            class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500">{{ __('Wallet') }}</span>
                    </a>
                    <a type="button" href="{{ route('scan_and_pay') }}"
                        class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 {{ areActiveRoutes(['scan_and_pay'], 'text-purple-600') }} text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M4,4h6v6H4V4M20,4v6H14V4h6M14,15h2V13H14V11h2v2h2V11h2v2H18v2h2v3H18v2H16V18H13v2H11V16h3V15m2,0v3h2V15H16M4,20V14h6v6H4M6,6V8H8V6H6M16,6V8h2V6H16M6,16v2H8V16H6M4,11H6v2H4V11m5,0h4v4H11V13H9V11m2-5h2v4H11V6M2,2V6H0V2A2,2,0,0,1,2,0H6V2H2M22,0a2,2,0,0,1,2,2V6H22V2H18V0h4M2,18v4H6v2H2a2,2,0,0,1-2-2V18H2m20,4V18h2v4a2,2,0,0,1-2,2H18V22Z" />
                        </svg>

                        <span
                            class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['scan_and_pay'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">{{ __('Scan') }}</span>
                    </a>
                    <a type="button" href="{{ route('my_poems') }}"
                        class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        {{-- <svg class="w-6 h-6 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['my_poems','poems.show'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 10H20L16 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16 14L4 14L8 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg> --}}
                        <svg class="w-6 h-6 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['my_poems', 'poems.show'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            version="1.1" id="Layer_1" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999"
                            xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M75.241,303.631H41.448c-5.769,0-10.447,4.677-10.447,10.447s4.678,10.447,10.447,10.447h33.793 c5.769,0,10.447-4.677,10.447-10.447S81.01,303.631,75.241,303.631z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M75.241,329.489H41.448c-5.769,0-10.447,4.677-10.447,10.447s4.678,10.447,10.447,10.447h33.793 c5.769,0,10.447-4.677,10.447-10.447S81.01,329.489,75.241,329.489z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M75.241,355.347H41.448c-5.769,0-10.447,4.677-10.447,10.447c0,5.77,4.678,10.447,10.447,10.447h33.793 c5.769,0,10.447-4.677,10.447-10.447C85.688,360.025,81.01,355.347,75.241,355.347z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M156.239,303.631h-11.402c-5.769,0-10.447,4.677-10.447,10.447s4.678,10.447,10.447,10.447h11.402 c5.769,0,10.447-4.677,10.447-10.447S162.008,303.631,156.239,303.631z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M145.617,329.489h-0.78c-5.769,0-10.447,4.677-10.447,10.447s4.678,10.447,10.447,10.447h0.78 c5.769,0,10.447-4.677,10.447-10.447S151.386,329.489,145.617,329.489z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M10.584,478.781h-0.137C4.678,478.781,0,483.459,0,489.229c0,5.77,4.678,10.447,10.447,10.447h0.137 c5.769,0,10.447-4.677,10.447-10.447C21.031,483.459,16.353,478.781,10.584,478.781z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M501.471,478.773h-0.137c-5.769,0-10.447,4.677-10.447,10.447c0,5.77,4.678,10.447,10.447,10.447h0.137 c5.769,0,10.447-4.677,10.447-10.447C511.919,483.45,507.24,478.773,501.471,478.773z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M266.212,249.052h-20.418c-5.769,0-10.447,4.677-10.447,10.447c0,11.39,9.267,20.656,20.656,20.656 c11.39,0,20.655-9.266,20.656-20.656C276.66,253.729,271.981,249.052,266.212,249.052z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M284,433.85h-0.137c-5.769,0-10.447,4.677-10.447,10.447c0,5.77,4.678,10.447,10.447,10.447H284 c5.769,0,10.447-4.677,10.447-10.447C294.447,438.527,289.769,433.85,284,433.85z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M217.859,199.83c-6.439,0-11.677,5.238-11.677,11.678c0,6.439,5.238,11.677,11.677,11.677s11.678-5.238,11.678-11.677 C229.537,205.068,224.298,199.83,217.859,199.83z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M294.061,199.83c-6.439,0-11.678,5.238-11.678,11.678c0,6.439,5.239,11.677,11.678,11.677 c6.439,0,11.677-5.238,11.677-11.677C305.738,205.068,300.499,199.83,294.061,199.83z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M500.971,284.652c13.298-30.146,14.615-63.466,3.708-93.825c-0.967-2.693-2.997-4.872-5.615-6.026 c-2.619-1.155-5.597-1.186-8.237-0.085c-29.776,12.414-53.498,35.852-66.796,65.998c-12.802,29.021-14.494,60.984-4.871,90.415 c-3.458,13.021-6.294,26.987-8.075,41.715h-8.075c-5.407-9.95-13.679-17.731-23.325-21.75l-67.237-28.014 c-2.39-0.996-3.936-3.313-3.936-5.904v-16.269l27.309-15.658c0.19-0.109,0.377-0.225,0.56-0.346 c13.673-9.031,22.652-25.089,24.017-42.958c0.021-0.264,0.03-9.469,0.03-9.469c13.567-4.413,23.401-17.18,23.401-32.2 s-9.834-27.787-23.401-32.2v-3.404c0.746,0.019,1.492,0.039,2.242,0.039c9.381,0,19.01-1.44,28.466-4.371 c4.345-1.348,7.32-5.352,7.354-9.902s-2.881-8.598-7.206-10.01c-25.136-8.202-29.14-13.933-32.248-29.733 c6.921-6.577,20.602-10.146,37.835-3.824c4.04,1.482,8.577,0.335,11.427-2.891c2.851-3.225,3.431-7.868,1.462-11.696 c-14.553-28.298-37.487-36.026-54.164-37.527c-6.815-0.612-13.127-0.232-18.333,0.474c0.507-2.762,1.454-5.491,3.125-7.524 c0.821-0.999,3.318-4.036,11.056-4.16c4.446-0.071,8.359-2.949,9.753-7.171c1.394-4.222-0.038-8.864-3.568-11.568 c-15.605-11.955-41.173-15.597-60.791-8.666c-7.941,2.806-14.478,7.175-19.316,12.794c-13.048-14.029-28.115-22.592-44.951-25.516 c-33.858-5.877-61.98,13.714-63.159,14.552c-3.652,2.589-5.238,7.217-3.96,11.507c0.761,2.55,2.44,4.645,4.618,5.959 c-15.479,4.523-27.809,11.991-36.855,22.356c-12.458,14.276-13.594,28.663-13.683,30.256c-0.205,3.681,1.545,7.197,4.606,9.252 c3.061,2.054,6.978,2.346,10.306,0.764c5.434-2.58,16.395-6.337,25.799-6.8c-8.875,12.237-26.121,22.043-48.039,20.666 c-3.904-0.256-7.636,1.716-9.641,5.087c-2.004,3.37-1.952,7.58,0.135,10.9c10.23,16.275,27.615,26.182,48.784,28.49v11.665 c-13.567,4.413-23.401,17.18-23.401,32.2c0,15.02,9.834,27.787,23.401,32.2c0,0,0.01,9.205,0.03,9.469 c1.372,17.942,10.287,34.001,23.849,42.958c0.187,0.123,0.377,0.24,0.573,0.352l27.465,15.701v16.219 c0,2.59-1.545,4.907-3.936,5.904l-67.237,28.016c-3.186,1.328-6.195,3.054-8.991,5.104v-71.217h15.293 c5.769,0,10.447-4.677,10.447-10.447c0-5.77-4.678-10.447-10.447-10.447H10.499c-5.769,0-10.447,4.677-10.447,10.447v136.461 c0,5.77,4.678,10.447,10.447,10.447h91.846v47.333H44.383c-5.77,0-10.447,4.678-10.447,10.447c0,5.769,4.678,10.447,10.447,10.447 h415.299c14.996,0,27.197-12.2,27.197-27.198v-32.453c0-14.315-11.116-26.082-25.17-27.122v-19.603 c0-5.77-4.678-10.447-10.447-10.447h-19.109c1.573-11.987,3.91-23.457,6.724-34.278 C466.444,335.715,488.382,313.193,500.971,284.652z M102.345,410.547H20.946v-4.919h64.425c5.769,0,10.447-4.677,10.447-10.447 c0-5.77-4.678-10.447-10.447-10.447H20.946v-18.939v-70.814h81.399V410.547z M135.91,140.677 c25.994-6.346,44.034-24.948,49.777-44.141c1.465-4.897-0.826-10.134-5.418-12.379c-9.701-4.746-21.32-4.416-31.384-2.51 c8.737-9.997,26.406-20.498,62.078-20.498c3.852,0,7.391-2.12,9.209-5.515c1.818-3.395,1.621-7.516-0.514-10.722 c-2.991-4.493-7.167-7.916-11.77-10.525c1.581-0.306,3.206-0.564,4.871-0.757c22.632-2.637,42.15,7.511,57.988,30.161 c2.354,3.365,6.462,5.04,10.496,4.279c4.035-0.761,7.25-3.814,8.219-7.805c1.644-6.787,6.469-11.637,14.339-14.417 c6.275-2.217,13.729-2.796,20.896-1.935c-0.153,0.178-0.302,0.354-0.446,0.53c-11.263,13.7-8.103,33.427-7.705,35.631 c0.544,3.021,2.39,5.65,5.048,7.188c2.658,1.538,5.856,1.827,8.749,0.796c0.103-0.038,10.607-3.635,23.383-2.484 c7.998,0.72,15.063,3.132,21.153,7.21c-16.31,1.243-28.874,9.156-35.642,19.121c-1.525,2.246-2.117,4.998-1.648,7.674 c2.56,14.614,6.026,25.086,14.539,33.461c-8.395-1.326-16.176-4.274-22.734-8.779c-9.982-6.857-15.871-16.509-16.582-27.18 c-0.331-4.992-4.157-9.046-9.12-9.671c-0.44-0.055-0.876-0.083-1.311-0.083c-4.462,0-8.5,2.86-9.92,7.193 c-3.762,11.473-15.358,27.198-34.19,34.096c7.55-20.944,4.927-42.552,4.769-43.769c-0.511-3.971-3.248-7.298-7.045-8.571 c-3.794-1.271-7.987-0.261-10.786,2.6c-11.172,11.416-45.616,41.94-70.5,46.03C157.005,147.814,144.527,145.064,135.91,140.677z M298.197,169.396c-20.59,0-37.86,14.436-42.252,33.715c-4.391-19.278-21.661-33.715-42.251-33.715 c-13.197,0-25.027,5.936-32.983,15.269l-8.33-4.212v-14.148c1.89-0.21,3.797-0.467,5.721-0.784 c22.23-3.654,46.917-21.243,63.361-34.986c-1.476,8.619-4.598,18-10.952,24.967c-2.788,3.058-3.509,7.473-1.839,11.258 c1.672,3.786,5.42,6.229,9.557,6.229c26.399,0,48.185-12.988,61.709-29.696c4.301,6.945,10.238,13.112,17.626,18.187 c6.595,4.53,14.031,7.911,21.973,10.125v8.898l-8.274,4.259C323.307,175.372,311.44,169.396,298.197,169.396z M320.644,212.737 c0,12.378-10.07,22.448-22.447,22.448c-12.377,0-22.448-10.07-22.448-22.448s10.071-22.447,22.448-22.447 C310.574,190.29,320.644,200.36,320.644,212.737z M236.141,212.737c0,12.378-10.07,22.448-22.447,22.448 s-22.448-10.07-22.448-22.448s10.071-22.447,22.448-22.447S236.141,200.36,236.141,212.737z M186.625,277.296 c-7.984-5.405-13.283-15.291-14.244-26.568v-17.051c0-5.77-4.678-10.447-10.447-10.447c-7.143,0-12.954-5.812-12.954-12.954 c0-6.42,4.699-11.749,10.836-12.766l11.568,5.85c-0.67,3.021-1.033,6.156-1.033,9.375c0,23.899,19.443,43.343,43.343,43.343 c20.59,0,37.86-14.436,42.251-33.715c4.392,19.279,21.663,33.715,42.252,33.715c23.899,0,43.342-19.443,43.342-43.343 c0-3.174-0.352-6.265-1.003-9.247l11.604-5.973c6.119,1.031,10.8,6.352,10.8,12.759c0,7.143-5.812,12.954-12.954,12.954 c-5.769,0-10.447,4.677-10.447,10.447v17.049c-0.949,11.047-6.442,21.172-14.417,26.573c0,0-56.47,32.387-56.653,32.508 c-7.833,5.172-17.183,5.172-25.016,0C243.266,309.685,186.625,277.296,186.625,277.296z M287.621,322.889v41.815 c0,17.378-14.18,31.516-31.61,31.516c-17.486,0-31.712-14.138-31.712-31.516v-41.803l7.939,4.538 c7.333,4.763,15.528,7.144,23.724,7.144c8.198,0,16.395-2.383,23.73-7.148L287.621,322.889z M317.798,454.744h31.888v17.726 c0,2.17,0.263,4.278,0.745,6.303H123.24v-57.78v-12.861c0-11.775,7.32-23.706,17.028-27.751l63.136-26.306v10.628 c0,28.899,23.599,52.411,52.606,52.411c28.952,0,52.505-23.512,52.505-52.411v-10.628l63.136,26.306 c2.577,1.074,4.994,2.692,7.162,4.738c-2.405,1.914-3.95,4.86-3.95,8.173v19.603c-11.973,0.884-21.809,9.556-24.464,20.954 h-32.601c-5.769,0-10.447,4.677-10.447,10.447S312.029,454.744,317.798,454.744z M440.814,403.739v19.528 c0,5.77,4.678,10.447,10.447,10.447h8.419c3.476,0,6.303,2.828,6.303,6.303v32.453c0,3.476-2.827,6.303-6.303,6.303h-60.555 h-22.241c-3.476,0-6.303-2.828-6.303-6.303v-32.453c0-3.476,2.827-6.303,6.303-6.303h8.425h25.32 c5.769,0,10.447-4.677,10.447-10.447c0-5.77-4.678-10.447-10.447-10.447h-14.873v-9.081H440.814z M488.337,209.118 c9.62,41.002-6.854,84.591-40.03,109.533c14.762-39.827,33.124-65.4,33.538-65.971c3.409-4.653,2.401-11.189-2.251-14.6 c-4.652-3.411-11.191-2.405-14.603,2.249c-1.102,1.503-16.526,22.837-30.9,57.102C435.87,261.385,456.056,227.151,488.337,209.118 z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M173.562,408.784h-0.137c-5.769,0-10.447,4.677-10.447,10.447s4.678,10.447,10.447,10.447h0.137 c5.769,0,10.447-4.677,10.447-10.447S179.331,408.784,173.562,408.784z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M191.548,443.252h-0.137c-5.769,0-10.447,4.677-10.447,10.447c0,5.77,4.678,10.447,10.447,10.447h0.137 c5.769,0,10.447-4.677,10.447-10.447C201.996,447.929,197.317,443.252,191.548,443.252z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>


                        <span
                            class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['my_poems', 'poems.show'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">{{ __('My Poems') }}</span>
                    </a>
                    <a type="button" href="{{ route('profile') }}"
                        class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                       
                        <span
                            class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">{{ __('Profile') }}</span>
                    </a>

                </div>
            </div>

        </div>

    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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

        if (token) {
            $.ajaxSetup({
                headers: {
                    'X_CSRF_TOKEN': token.content
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
        @elseif (session('saved'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('saved') }}'
            })
        @elseif (session('deleted'))
            Toast.fire({
                icon: 'danger',
                title: '{{ session('deleted') }}'
            })
        @endif
    </script>
    {{-- <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script> --}}


</body>

</html>
