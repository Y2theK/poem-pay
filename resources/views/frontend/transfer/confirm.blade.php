@section('title', 'Transfer Confirmation')
<x-app-layout>
    {{-- Transfer Card --}}
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">

            <form method="POST" action="{{ route('transfer.complete') }}" class="transfer-confirm-form">
                @csrf
                @include('backend.layouts.flash')
                <!-- From Phone-->
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('From')" class="mb-2  font-bold" />

                    <label class='block font-medium text-sm  text-gray-700  dark:text-gray-100'>
                        {{ $from_account_user->name }}
                    </label>
                    <label class='block font-medium  text-sm text-gray-700  dark:text-gray-100'>
                        {{ $from_account_user->phone }}
                    </label>



                </div>

                <!-- To Phone-->
                <input type="hidden" name="hash_value" value="{{ $hash_value }}">
                <input type="hidden" name="to_phone" value="{{ $to_account_user->phone }}">
                <input type="hidden" name="amount" value="{{ $amount }}">
                <input type="hidden" name="description" value="{{ $description }}">
                <div class="mt-4">
                    <x-label for="to_phone" :value="__('To')" class="font-bold " />
                    <label class='block font-semibold text-sm text-gray-700 text-muted  dark:text-gray-100'>
                        {{ $to_account_user->name }}
                    </label>
                    <label class='block  font-semibold text-sm text-gray-700 text-muted  dark:text-gray-100'>
                        {{ $to_account_user->phone }}
                    </label>

                    <x-label for="to_phone" :value="__('Amount')" class="font-bold mt-4" />

                    <label class='block font-medium text-sm text-gray-700 text-muted  dark:text-gray-100'>
                        {{ $amount }} <span class="text-xs">MMK</span>
                    </label>


                    @if ($description)
                        <x-label for="to_phone" :value="__('Description')" class="font-bold mt-4 " />
                        <label class='block font-medium text-sm text-gray-700 text-muted  dark:text-gray-100'>
                            {{ $description }}
                        </label>
                    @endif




                </div>



                <div class=" mt-5">
                    <x-button class="w-full confirm-btn flex items-center justify-center" data-modal-target="password-modal"
                        data-modal-toggle="password-modal">
                        {{ __('Confirm') }}
                    </x-button>
                </div>

            </form>
        </div>
    </div>


    <!-- Main modal -->
    <div id="password-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-40 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-900 border border-gray-100 dark:border-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="password-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    {{-- <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Please enter your password</h3> --}}
                    <form class="space-y-6" action="#">

                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Enter your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 dark:bg-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 text-center dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="text-right">
                        <button data-modal-hide="password-modal" type="button"
                            class="text-gray-500 bg-white mr-2 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-800 dark:focus:ring-gray-600">No,
                            cancel</button>
                            <button data-modal-hide="password-modal" type="button"
                            class="password-check-btn text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Confirm
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.confirm-btn', function(e) {
                    e.preventDefault();
                });
                $(document).on('click', '.password-check-btn', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: '{{ route('password.check', ['password' => '']) }}' + $(
                            '#password').val(),
                        type: 'GET',
                        success: function(res) {
                            if (res.status == 'success') {
                                $('.transfer-confirm-form').submit();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                });
                            }
                        }
                    });

                });

                

            });
        </script>

    @endsection
</x-app-layout>
