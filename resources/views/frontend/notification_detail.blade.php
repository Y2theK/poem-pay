@section('title', 'Notification Detail')
<x-app-layout>
    {{-- Profile Card --}}
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center">
                <img src="{{ asset('image/logo/animation_notification.gif') }}" alt="Noti Noti" class="" >
            </div>
            <div class="flex justify-center flex-col items-center text-gray-900 dark:text-white">
               <p class="font-bold text-md mt-2 text-center">{{ $notification->data['title'] }}</p> 
               <p class="text-xs md:text-sm text-center mt-2">{{ $notification->data['message'] }}</p> 
               <small class="text-muted mt-2 text-center">{{ $notification->created_at->format('d M, Y H:i A') }}</small> 
               <x-button class="mt-4">
                <a href="{{ $notification->data['web_link'] }}">{{ __('Continue') }}</a>
                
            </x-button>
            </div>

          
        </div>
    </div>



</x-app-layout>
