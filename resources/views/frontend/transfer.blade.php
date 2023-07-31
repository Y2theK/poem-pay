@section('title', 'Transfer')
<x-app-layout>
    {{-- Profile Card --}}
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <form method="GET" action="{{ route('transfer.confirm') }}">
                {{-- @csrf --}}


                <!-- To Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('From')" class="mb-3" />

                    <label class='block font-medium text-sm text-gray-700'>
                        {{ $user->name }}
                    </label>
                    <label class='block font-medium text-sm text-gray-700'>
                        {{ $user->phone }}
                    </label>



                </div>
                <!-- To Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" class="inline-block" /><span class="to_account_info text-green-500"></span>
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

                    <textarea id="description" placeholder="Chit lox" rows="3" style="resize: none;"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="text" name="description"></textarea>
                    @error('description')
                        <span class="text-xs ml-1 text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </div>



                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Continue') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
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
