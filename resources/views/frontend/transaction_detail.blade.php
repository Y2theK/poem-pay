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
                        <span>{{ __('Amount') }}</span> <span>{{ $transaction->amount }} <small>MMK</small> </span>
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
