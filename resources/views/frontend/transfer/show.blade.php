@section('title', 'Transfer')
<x-app-layout>
    {{-- Profile Card --}}
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">

            <form method="GET" action="{{ route('transfer.confirm') }}" class="transfer_form">
                {{-- @csrf --}}
                @include('backend.layouts.flash')

                <input type="hidden" name="hash_value" value="">
                <!-- From Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('From')" class="mb-3" />

                    <label class='block font-medium text-sm text-gray-700 dark:text-gray-200'>
                        {{ $user->name }}
                    </label>
                    <label class='block font-medium text-sm text-gray-700 dark:text-gray-200'>
                        {{ $user->phone }}
                    </label>



                </div>

                {{-- @if ($to_account)
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" class="mb-3" />

                    <label class='block font-medium text-sm text-gray-700'>
                        {{ $to_account->name }}
                    </label>
                    <label class='block font-medium text-sm text-gray-700'>
                        {{ $to_account->phone }}
                    </label>
                    <input type="hidden" name="to_phone" value="{{ $to_account->phone }}">
                    
                </div>
                @else
                   <!-- To Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" class="inline-block" /><span class="to_account_info text-green-500 font-semibold text-xs"></span>
                    <div class="flex">
                        <x-input id="to_phone" class="block mt-1 w-full" type="number" placeholder="09123987456"
                            name="to_phone" value="{{ old('to_phone') }}" />
                        <button type="button"
                            class="ml-2 px-2 verify-btn text-white bg-purple-700 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  border  hover:bg-purple-800  focus:outline-none  dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                            <i class="las la-user-check text-xl"></i>
                        </button>
                    </div>
                    @error('to_phone')
                        <span class="text-xs ml-1 text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                @endif --}}


                <!-- To Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" class="inline-block" /><span class="to_account_info text-green-500 font-semibold text-xs"></span>
                    <div class="flex justify-center items-center">
                        <x-input id="to_phone" class="block mt-1 w-full " type="number" placeholder="09123987456"
                            name="to_phone" value="{{ $to_account->phone ?? old('to_phone')}}" />
                        {{-- <button type="button"
                            class="ml-2 px-2 verify-btn text-white bg-purple-700 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  border  hover:bg-purple-800  focus:outline-none  dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">                            
                        </button> --}}
                        <div class="shrink-0 ml-2 w-8 text-green-300 verify-btn cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9333ea" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                              </svg>                                
                        </div>
                       
                        
                    </div>
                    @error('to_phone')
                        <span class="text-xs ml-1 text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Amounnt -->
                <div class="mt-4">
                    <x-label for="amount" :value="__('Amount')" />
                    <x-input id="amount" class="block mt-1 w-full" placeholder="1000" type="number" name="amount"
                        value="{{ old('amount') }}" />
                    @error('amount')
                        <span class="text-xs ml-1 text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror

                </div>
                <!-- Amounnt -->
                <div class="mt-4">
                    <x-label for="description" :value="__('Remark')" />
                    <textarea id="description" placeholder="Write a short description" rows="3" style="resize: none;"
                        class="block mt-1 w-full rounded-md shadow-sm bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-800  dark:text-white text-dark  focus:border-gray-800 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                        type="text" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-xs ml-1 text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </div>



                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3 submit-btn">
                        {{ __('Continue') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
             $(document).on('click','.submit-btn',function(e){
                e.preventDefault();
                var to_phone = $("[name='to_phone']").val();
                var amount = $("[name='amount']").val();
                var description = $("[name='description']").val();
                 $.ajax({
                     url: "{{ route('transfer.hash') }}" + `?to_phone=${to_phone}&amount=${amount}&description=${description}`,
                     type: 'GET',
                     success : function(res){
                         if(res.status == 'success'){
                            $("[name='hash_value']").val(res.data);
                            console.log(res.data);
                            $('.transfer_form').submit();
                         }
                     }
                 });
            });
            $(document).on('click','.verify-btn',function(e){
             
                $.ajax({
                    url : "{{ route('to_account_verify', ['phone' => '']) }}" + $("[name='to_phone']").val(),
                    type : 'GET',
                    success : function(res){
                        if(res.status == 'success'){
                            $('.to_account_info').addClass('text-green-500').removeClass('text-red-500');
                            $('.to_account_info').text('( ' + res.data['name'] + ' )');
                        }else{
                            $('.to_account_info').addClass('text-red-500').removeClass('text-green-500');
                            $('.to_account_info').text('( ' + res.message + ' )');

                        }
                    }
                })
            });
        });
    </script>
@endsection



</x-app-layout>
