@section('title', 'Exchange Detail')
<x-app-layout>
    
    {{-- Profile Card --}}
    <div class="flex justify-center text-sm ">
      
        <div
            class="w-full px-5 py-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            
            <div class="flex flex-col items-center py-4">
                <div class="flex justify-center flex-col mb-4 items-center">
                    <img class="w-20 h-20 text-center mb-5"
                    src=" {{ asset('image/logo/animation_correct.gif') }}"
                    alt="" />
                    <span
                    class="text-green-500">
                    {{ $totalExchangableAmount }} <small>MMK</small> </span>
                </div>

                <div class="w-full px-5 ">
                    
                    <div class=" flex border-b py-4  border-gray-200 dark:border-gray-700 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Title') }}</span> <span>{{ $post->title }}</span>
                    </div>
                    {{-- <hr> --}}
                    <div class=" flex border-b py-4  border-gray-200 dark:border-gray-700  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Reactions Amount') }}</span> 
                        <span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-green-500">{{ $post->reactions_count * $config->reaction_rate }} MMK</span>
                    </div>
                    {{-- <hr> --}}
                    <div class=" flex border-b py-4  border-gray-200 dark:border-gray-700  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Comment Amount') }}</span> 
                        <span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-green-500">{{ $post->comments_count * $config->comment_rate }} MMK</span>
                    </div>
                    {{-- <hr> --}}
                    <div class=" flex border-b py-4  border-gray-200 dark:border-gray-700  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Share Amount') }}</span> 
                        <span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-green-500">{{ $post->shares_count * $config->share_rate }} MMK</span>
                    </div>
                    {{-- <hr> --}}
                    <div class=" flex border-b py-4  border-gray-200 dark:border-gray-700  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Posted Date') }}</span> <span>{{ $post->created_at->format('Y/m/d H:i:s') }}</span>
                    </div>
                    {{-- <hr> --}}
                    <div class=" flex border-b py-4  border-gray-200 dark:border-gray-700 mb-0  justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>{{ __('Total') }}</span> <span>{{ $totalExchangableAmount }} MMK</span>
                    </div>
                    <form action="{{ route('exchange.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="flex mt-10 mb-0  justify-center text-md font-medium text-gray-900 dark:text-white">
                            <x-button class="text-center" type="submit">
                                {{ __('Exchange now') }}
                            </x-button>
                        </div>
                    </form>
                  
                    
                    {{-- <hr> --}}
                </div>
            </div>
        </div>
    </div>

   


</x-app-layout>
