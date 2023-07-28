@section('title', 'Transfer Confirmation')
<x-app-layout>
    {{-- Transfer Card --}}
    <div class="flex justify-center">
        
        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <form method="POST" action="{{ route('transfer.confirm') }}">
                @csrf

                 <!-- From Phone-->
                 <div class="mt-4">
                    <x-label for="to_phone" :value="__('From')" class="mb-2  font-bold"/>

                    <label class='block font-medium text-sm  text-gray-700'>
                        {{ $user->name }}
                    </label>
                    <label class='block font-medium  text-sm text-gray-700'>
                        {{ $user->phone }}
                    </label>
                    
                   
                   
                </div>

                <!-- To Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" class="font-bold "/>

                    <label class='block font-medium text-sm text-gray-700 text-muted'>
                        {{ $to_phone }}
                    </label>

                    <x-label for="to_phone" :value="__('Amount')" class="font-bold mt-4"/>

                    <label class='block font-medium text-sm text-gray-700 text-muted'>
                        {{ $amount }} <span class="text-xs">MMK</span>
                    </label>

                    
                    @if ($description != '')
                    <x-label for="to_phone" :value="__('Description')" class="font-bold mt-4"/>
                    <label class='block font-medium text-sm text-gray-700 text-muted'>
                        {{ $description }}
                    </label>
                    @endif
                    
                    
                   
                   
                </div>
        


                <div class=" mt-5">
                    <x-button class="w-full flex items-center justify-center">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>



</x-app-layout>
