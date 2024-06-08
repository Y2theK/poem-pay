@section('title', 'Exchange Detail')
<x-app-layout>
    
    {{-- Profile Card --}}
    <div class="flex justify-center text-sm ">
      
        <div
            class="w-full px-5 py-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            
            <div class="flex flex-col items-center py-4">
                <div class="flex justify-center flex-col mb-4 items-center">
                    <img class="w-20 h-20 text-center mb-5"
                    src=" {{ asset('image/logo/animation_correct.gif') }}"
                    alt="" />
                    <span
                    class="text-green-500">
                    {{ $exchangeLog->total_amount }} <small>MMK</small> </span>
                </div>

                <div class="w-full px-5 ">
                    
                    <div class=" flex my-4 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Title') }}</span> <span>{{ $exchangeLog->post->title }}</span>
                    </div>
                    <hr>
                    <div class=" flex my-4  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Reactions Amount') }}</span> 
                        <span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-green-500">{{ $exchangeLog->reaction_amount }} MMK</span>
                    </div>
                    <hr>
                    <div class=" flex my-4  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Comment Amount') }}</span> 
                        <span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-green-500">{{ $exchangeLog->comment_amount }} MMK</span>
                    </div>
                    <hr>
                    <div class=" flex my-4  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Share Amount') }}</span> 
                        <span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-green-500">{{ $exchangeLog->share_amount }} MMK</span>
                    </div>
                    <hr>
                    <div class=" flex my-4  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Exchange Date') }}</span> <span>{{ $exchangeLog->created_at->format('Y/m/d H:i:s') }}</span>
                    </div>
                    <hr>
                    <div class=" flex mt-4 mb-0  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Total') }}</span> <span>{{ $exchangeLog->total_amount }} MMK</span>
                    </div>
                    {{-- <hr> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
