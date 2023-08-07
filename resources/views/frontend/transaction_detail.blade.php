@section('title', 'Transaction Detail')
<x-app-layout>
    
    {{-- Profile Card --}}
    <div class="flex justify-center text-sm ">
      
        <div
            class="w-full px-5 py-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            
            <div class="flex flex-col items-center py-4">
                <div class="flex justify-center flex-col mb-4 items-center">
                    <img class="w-20 h-20 text-center mb-5"
                    src=" {{ asset('image/logo/animation_correct.gif') }}"
                    alt="{{ $user->name }}" />
                    <span
                    class="{{ $transaction->type == 1 ? 'text-green-500' : 'text-red-500' }}">
                    {{ $transaction->amount }} <small>MMK</small> </span>
                </div>
                @if (session('transfer_success'))
                    
                    <div id="alertSuccess" class="flex items-center justify-center  w-full  max-w-5xl p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-medium ">
                        {{ session('transfer_success') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alertSuccess" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        </button>
                    </div>
                @endif

                <div class="w-full px-5 ">
                    <div class=" flex my-4 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('ID') }}</span> <span>{{ $transaction->trx_id }}</span>
                    </div>
                    <hr>
                    {{-- <div class=" flex my-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Reference ID') }}</span> <span>{{ $transaction->ref_no }}</span>
                    </div> --}}
                    {{-- <hr> --}}
                    <div class=" flex my-4  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Type') }}</span> <span class="px-2 py-1 rounded-md  text-xs font-bold text-white {{ $transaction->type == 1 ? 'bg-green-500' : 'bg-red-500' }}">{{ $transaction->type == 1 ? 'Income' : 
                        'Expense'}}</span>
                    </div>
                    <hr>
                    <div class=" flex my-4 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Amount') }}</span> <span>{{ number_format($transaction->amount) }} <small>MMK</small> </span>
                    </div>
                    <hr>
                    <div class=" flex my-4  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Date') }}</span> <span>{{ $transaction->created_at->format('Y/m/d H:i:s') }}</span>
                    </div>
                    <hr>
                    <div class=" flex my-4 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('To') }}</span> <span>{{ $transaction->source->phone }}</span>
                    </div>
                    <hr>
                    <div class=" flex mt-4 mb-0  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Note') }}</span> <span>{{ $transaction->description }}</span>
                    </div>
                    {{-- <hr> --}}
                </div>
            </div>
        </div>
    </div>

   


</x-app-layout>
