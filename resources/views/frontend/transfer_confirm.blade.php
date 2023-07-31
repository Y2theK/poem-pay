@section('title', 'Transfer Confirmation')
<x-app-layout>
    {{-- Transfer Card --}}
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <form method="POST" action="{{ route('transfer.complete') }}">
                @csrf
                @include('backend.layouts.flash')
                <!-- From Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('From')" class="mb-2  font-bold" />

                    <label class='block font-medium text-sm  text-gray-700'>
                        {{ $from_account_user->name }}
                    </label>
                    <label class='block font-medium  text-sm text-gray-700'>
                        {{ $from_account_user->phone }}
                    </label>



                </div>

                <!-- To Phone-->
                <input type="hidden" name="to_phone" value="{{ $to_account_user->phone }}">
                <input type="hidden" name="amount" value="{{ $amount }}">
                <input type="hidden" name="description" value="{{ $description }}">
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" class="font-bold " />
                    <label class='block font-semibold text-sm text-gray-700 text-muted'>
                        {{ $to_account_user->name }}
                    </label>
                    <label class='block  font-semibold text-sm text-gray-700 text-muted'>
                        {{ $to_account_user->phone }}
                    </label>

                    <x-label for="to_phone" :value="__('Amount')" class="font-bold mt-4" />

                    <label class='block font-medium text-sm text-gray-700 text-muted'>
                        {{ $amount }} <span class="text-xs">MMK</span>
                    </label>


                    @if ($description)
                        <x-label for="to_phone" :value="__('Description')" class="font-bold mt-4" />
                        <label class='block font-medium text-sm text-gray-700 text-muted'>
                            {{ $description }}
                        </label>
                    @endif




                </div>



                <div class=" mt-5">
                    <x-button class="w-full confirm-btn flex items-center justify-center">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>


    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {

                $('.confirm-btn').on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Please enter your password',
                        input: 'password',
                        inputAttributes: {
                            autocapitalize: 'off',
                            id: 'password',
                            class: 'text-center'
                        },
                        showCancelButton: true,
                        reverseButtons: true,
                        confirmButtonText: 'Confirm',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route('password.check', ['password' => '']) }}' + $(
                                    '#password').val(),
                                type: 'GET',
                                success: function(res) {
                                    if (res.status == 'success') {
                                         $('form').submit();
                                    }else{
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Something went wrong!',
                                        });
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>

    @endsection
</x-app-layout>
