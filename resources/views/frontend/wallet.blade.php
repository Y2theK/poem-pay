@section('title', 'Wallet')
<x-app-layout>
    <div class="flex justify-center px-7">
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
                        {{ $user->wallet ? implode(' ', str_split($user->wallet->account_number, 4)) : '-' }}
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
    {{-- </div> --}}

</x-app-layout>
