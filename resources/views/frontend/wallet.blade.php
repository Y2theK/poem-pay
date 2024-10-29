@section('title', 'Wallet')
<x-app-layout>
    <div class="flex justify-center px-0 ">
        {{-- <div class="flex flex-col space-y-8 w-full px-16 max-w-xl"> --}}

        <!-- card -->
        <div
            class="bg-gradient-to-tl  max-w-5xl  w-full from-gray-800 to-gray-700 text-white h-56 p-6 rounded-xl shadow-md">
            <div class="h-full flex flex-col justify-between">
                <div class="flex items-start justify-between space-x-4">
                    <div class=" text-xl font-semibold tracking-tigh uppercase font-mono">
                        {{ $user->name }}
                    </div>

                    <div class="inline-flex flex-col items-center justify-center">
                        <div class="shrink-0 w-8">
                            <a href="{{ route('home') }}">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>

                    </div>
                </div>

                <div
                    class="inline-block w-12 mb-2 h-8 bg-gradient-to-tl from-yellow-200 to-yellow-100 rounded-md shadow-inner overflow-hidden">
                    <div class="relative w-full h-full grid grid-cols-2 gap-1">
                        <div class="absolute border border-gray-800 rounded w-4 h-6 left-4 top-1"></div>
                        <div class="border-b border-r border-gray-800 rounded-br"></div>
                        <div class="border-b border-l border-gray-800 rounded-bl"></div>
                        <div class=""></div>
                        <div class=""></div>
                        <div class="border-t border-r border-gray-800 rounded-tr"></div>
                        <div class="border-t border-l border-gray-800 rounded-tl"></div>
                    </div>
                </div>

                <div class="">
                    <div class="text-md font-semibold tracking-tight font-mono">
                        {{ $user->wallet ? transaction_format($user->wallet->account_number) : '-' }}
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="font-mono">
                        <div class="text-xs  font-semibold tracking-tight uppercase">
                            balance
                        </div>
                        <div class="text-xl font-semibold">
                            {{ $user->wallet ? number_format($user->wallet->amount) : '-' }}
                            <span class="text-xs font-semibold tracking-tight">
                                MMK
                            </span>
                        </div>


                    </div>
                    <div>
                        <span class="font-semibold  text-xs font-mono text-white">
                            Since {{ $user->created_at->format('m / d') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- Horizontal Menu Action --}}
    <div class="flex justify-center">
        <div class="w-full max-w-5xl bg-transparent mt-10">
            <div class="grid grid-flow-col space-x-3 grid-cols-2">
                <a href="{{ route('scan_and_pay') }}"
                    class="flex p-5 cursor-pointer  bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow items-center justify-center text-md font-medium text-gray-900 dark:text-white  group">
                    <img src="{{ asset('image/logo/scanQR.png') }}" alt="Scan QR" class="w-5 h-5">
                    <span class="ml-5">{{ __('Scan & Pay') }}</span>
                </a>
                <a href="{{ route('receive_qr') }}"
                    class="flex p-5 cursor-pointer  bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow items-center justify-center text-md font-medium text-gray-900 dark:text-white  group">
                    <img src="{{ asset('image/logo/myQR.png') }}" alt="My QR" class="w-6 h-6">
                    <span class="ml-5">{{ __('Receive QR') }}</span>
                </a>
            </div>
        </div>
    </div>
    {{-- Vertical Menu Actions --}}
    <div class="flex justify-center mt-5">
        <div
            class="w-full px-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <a href="{{ route('transfer') }}"
                class="flex cursor-pointer my-4 py-2 px-5 items-center justify-between text-md font-medium text-gray-900 dark:text-white">
                <div class="flex justify-center items-center">
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg class="w-6 h-6 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M171.574,0H40.851C18.325,0,0,18.325,0,40.851v250.553c0,22.526,18.325,40.851,40.851,40.851h130.723
   c22.526,0,40.851-18.325,40.851-40.851V40.851C212.426,18.325,194.1,0,171.574,0z M196.085,291.404
   c0,13.515-10.996,24.511-24.511,24.511H40.851c-13.515,0-24.511-10.996-24.511-24.511v-13.617h179.745V291.404z M196.085,54.468
   H73.532c-4.513,0-8.17,3.657-8.17,8.17s3.657,8.17,8.17,8.17h122.553v190.638H16.34V70.809h24.511c4.513,0,8.17-3.657,8.17-8.17
   s-3.657-8.17-8.17-8.17H16.34V40.851c0-13.515,10.996-24.511,24.511-24.511h130.723c13.515,0,24.511,10.996,24.511,24.511V54.468z
   " />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M471.149,0H340.426c-22.526,0-40.851,18.325-40.851,40.851v250.553c0,22.526,18.325,40.851,40.851,40.851h130.723
   c22.526,0,40.851-18.325,40.851-40.851V40.851C512,18.325,493.675,0,471.149,0z M495.66,261.447h-24.511
   c-4.513,0-8.17,3.657-8.17,8.17c0,4.513,3.657,8.17,8.17,8.17h24.511v13.617c0,13.515-10.996,24.511-24.511,24.511H340.426
   c-13.515,0-24.511-10.996-24.511-24.511v-13.617h122.553c4.513,0,8.17-3.657,8.17-8.17c0-4.513-3.657-8.17-8.17-8.17H315.915
   V70.809H495.66V261.447z M495.66,54.468H315.915V40.851c0-13.515,10.996-24.511,24.511-24.511h130.723
   c13.515,0,24.511,10.996,24.511,24.511V54.468z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M405.787,348.596c-4.513,0-8.17,3.657-8.17,8.17v78.979h-62.638V384c0-4.513-3.657-8.17-8.17-8.17h-38.128
   c-4.513,0-8.17,3.657-8.17,8.17s3.657,8.17,8.17,8.17h29.957v16.34H264.17V384c0-4.513-3.657-8.17-8.17-8.17h-70.808
   c-4.513,0-8.17,3.657-8.17,8.17v51.745h-62.638v-78.979c0-4.513-3.657-8.17-8.17-8.17c-4.513,0-8.17,3.657-8.17,8.17v87.149
   c0,4.513,3.657,8.17,8.17,8.17h70.809v35.404c0,13.515,10.996,24.511,24.511,24.511h108.936c13.515,0,24.511-10.996,24.511-24.511
   v-35.404h70.809c4.513,0,8.17-3.657,8.17-8.17v-87.149C413.957,352.253,410.3,348.596,405.787,348.596z M318.638,487.489
   c0,4.506-3.665,8.17-8.17,8.17H201.532c-4.506,0-8.17-3.665-8.17-8.17V392.17h54.468v24.511c0,4.513,3.657,8.17,8.17,8.17h62.638
   V487.489z" />
                            </g>
                        </g>
                    </svg>
                    <span class="ml-5">{{ __('Transfer') }}</span>
                </div>
                <div class="shrink-0  w-4 back-btn cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                      </svg>                      
                 </div>
            </a>
           
            <a href="{{ route('wallet') }}"
                class="flex cursor-pointer border-t border-gray-200 dark:border-gray-700   items-center py-6 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                <div class="flex justify-center items-center">
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg fill="#000000"
                        class="w-5 h-5 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <g>
                                <circle cx="407.273" cy="314.182" r="11.636" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M500.364,256h-11.636v-81.455c0-19.782-15.127-34.909-34.909-34.909h-23.273V58.182c0-19.782-15.127-34.909-34.909-34.909
   c-6.982,0-11.636,4.655-11.636,11.636c0,6.982,4.655,11.636,11.636,11.636c6.982,0,11.636,4.655,11.636,11.636v81.455h-34.909
   V58.182c0-19.782-15.127-34.909-34.909-34.909H104.727c-19.782,0-34.909,15.127-34.909,34.909v81.455H34.909
   C15.127,139.636,0,154.764,0,174.545v279.273c0,19.782,15.127,34.909,34.909,34.909h418.909c19.782,0,34.909-15.127,34.909-34.909
   v-46.545c0-6.982-4.655-11.636-11.636-11.636s-11.636,4.655-11.636,11.636v46.545c0,6.982-4.655,11.636-11.636,11.636H34.909
   c-6.982,0-11.636-4.655-11.636-11.636V174.545c0-6.982,4.655-11.636,11.636-11.636h418.909c6.982,0,11.636,4.655,11.636,11.636
   V256H384c-19.782,0-34.909,15.127-34.909,34.909v46.545c0,19.782,15.127,34.909,34.909,34.909h116.364
   c6.982,0,11.636-4.655,11.636-11.636v-93.091C512,260.655,507.345,256,500.364,256z M302.545,139.636H139.636v-25.6
   c9.309-3.491,17.455-11.636,20.945-20.945H281.6c3.491,9.309,11.636,17.455,20.945,20.945V139.636z M349.091,139.636h-23.273
   v-34.909c0-6.982-4.655-11.636-11.636-11.636s-11.636-4.655-11.636-11.636s-4.655-11.636-11.636-11.636H151.273
   c-6.982,0-11.636,4.655-11.636,11.636S134.982,93.091,128,93.091s-11.636,4.655-11.636,11.636v34.909H93.091V58.182
   c0-6.982,4.655-11.636,11.636-11.636h232.727c6.982,0,11.636,4.655,11.636,11.636V139.636z M488.727,349.091H384
   c-6.982,0-11.636-4.655-11.636-11.636v-46.545c0-6.982,4.655-11.636,11.636-11.636h104.727V349.091z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M407.273,186.182H58.182c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h349.091
   c6.982,0,11.636,4.655,11.636,11.636c0,6.982,4.655,11.636,11.636,11.636s11.636-4.655,11.636-11.636
   C442.182,201.309,427.055,186.182,407.273,186.182z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M430.545,395.636c-6.982,0-11.636,4.655-11.636,11.636c0,6.982-4.655,11.636-11.636,11.636H58.182
   c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h349.091c19.782,0,34.909-15.127,34.909-34.909
   C442.182,400.291,437.527,395.636,430.545,395.636z" />
                            </g>
                        </g>
                    </svg>
                    <span class="ml-5">{{ __('Wallet') }}</span>
                </div>
                <div class="shrink-0  w-4 back-btn cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                      </svg>                      
                 </div>
            </a>
          

            <a href="{{ route('transactions') }}"
                class="flex  cursor-pointer border-t border-gray-200 dark:border-gray-700  items-center py-6 px-5  justify-between text-md font-medium text-gray-900 dark:text-white  group">
                <div class="flex justify-center items-center">
                    <svg fill="#000000"
                        class="w-5 h-5 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['transactions', 'transactions.detail'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                        version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 496 496" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path d="M120,224c46.416,0,86.32-28.392,103.28-68.712C231.32,153.144,239.608,152,248,152c20.304,0,39.56,6.336,56,18.232V256
    h16V96h-19.44L376,26.848L451.44,96H432v176h16V112h44.56L376,5.152L259.44,112H304v39.16c-16.984-9.904-36.048-15.16-56-15.16
    c-6.424,0-12.8,0.608-19.088,1.688C230.864,129.424,232,120.856,232,112C232,50.24,181.76,0,120,0S8,50.24,8,112
    S58.24,224,120,224z M120,16c52.936,0,96,43.064,96,96c0,52.936-43.064,96-96,96c-52.936,0-96-43.064-96-96
    C24,59.064,67.064,16,120,16z" />
                                    <path d="M112,175.592V192h16v-16.408c17.952-2.016,32-17.112,32-35.592c0-19.848-16.152-36-36-36h-8c-11.032,0-20-8.976-20-20
    s8.968-20,20-20h8c11.032,0,20,8.976,20,20v4h16v-4c0-18.48-14.048-33.576-32-35.592V32h-16v16.408C94.048,50.424,80,65.52,80,84
    c0,19.848,16.152,36,36,36h8c11.032,0,20,8.976,20,20s-8.968,20-20,20h-8c-11.032,0-20-8.976-20-20v-4H80v4
    C80,158.48,94.048,173.576,112,175.592z" />
                                    <rect x="176" y="104" width="16" height="16" />
                                    <rect x="48" y="104" width="16" height="16" />
                                    <path d="M376,272c-46.416,0-86.32,28.392-103.28,68.712C264.68,342.856,256.392,344,248,344c-20.304,0-39.56-6.336-56-18.232V240
    h-16v160h19.44L120,469.152L44.56,400H64V224H48v160H3.44L120,490.848L236.56,384H192v-39.16c16.984,9.904,36.048,15.16,56,15.16
    c6.424,0,12.8-0.608,19.088-1.688C265.136,366.576,264,375.144,264,384c0,61.76,50.24,112,112,112s112-50.24,112-112
    S437.76,272,376,272z M376,480c-52.936,0-96-43.064-96-96c0-52.936,43.064-96,96-96c52.936,0,96,43.064,96,96
    C472,436.936,428.936,480,376,480z" />
                                    <rect x="432" y="376" width="16" height="16" />
                                    <rect x="304" y="376" width="16" height="16" />
                                    <path d="M352,361.496V376h-16v16h16v24c0,8.824-7.176,16-16,16v16h80v-16h-52.296c2.736-4.712,4.296-10.176,4.296-16v-24h48v-16
    h-48v-14.504C368,347.44,379.44,336,393.496,336H416v-16h-22.504C370.608,320,352,338.616,352,361.496z" />
                                    <rect x="80" y="384" width="16" height="16" />
                                    <rect x="80" y="240" width="16" height="128" />
                                    <rect x="336" y="96" width="16" height="112" />
                                    <rect x="336" y="224" width="16" height="16" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-5">{{ __('Transactions') }}</span>
                </div>
                <div class="shrink-0  w-4 back-btn cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                      </svg>                      
                 </div>
            </a>



        </div>
    </div>

</x-app-layout>
