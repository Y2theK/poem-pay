@section('title', 'Transfer')
<x-app-layout>
    {{-- Profile Card --}}
    <div class="flex justify-center">
        
        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <form method="POST" action="{{ route('transfer.confirm') }}">
                @csrf
                <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                 <!-- To Phone-->
                 <div class="mt-4">
                    <x-label for="to_phone" :value="__('From')" class="mb-3"/>

                    <label class='block font-medium text-sm text-gray-700'>
                        {{ $user->name }}
                    </label>
                    <label class='block font-medium text-sm text-gray-700'>
                        {{ $user->phone }}
                    </label>
                    
                   
                   
                </div>
                <!-- To Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" />
                    <x-input id="to_phone" class="block mt-1 w-full" type="number" placeholder="09123987456" name="to_phone" value="{{ old('to_phone') }}"
                         />
                </div>
                <!-- Amounnt -->
                <div class="mt-4">
                    <x-label for="amount" :value="__('Amount')" />

                    <x-input id="amount" class="block mt-1 w-full" placeholder="1000" type="number" name="amount" value="{{ old('amount') }}"
                         />
                </div>
                 <!-- Amounnt -->
                 <div class="mt-4">
                    <x-label for="description" :value="__('Remark')" />

                    <textarea id="description" placeholder="Chit lox" rows="3" style="resize: none;" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" 
                         ></textarea>
                </div>



                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Continue') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>



</x-app-layout>
