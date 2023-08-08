@section('title', 'Transactions')
<x-app-layout>

    {{-- Transactions lists --}}
    <div class="infinite-scroll">
        <div class="flex justify-center flex-col items-center">
            {{-- @foreach ($transactions as $month => $monthly_transactions) --}}
            {{-- {{ $month }} --}}
            @foreach ($transactions as $transaction)
                    <div
                        class="w-full  mb-2 py-2 px-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <a href="{{ route('transactions.detail', $transaction->trx_id) }}"
                            class="flex cursor-pointer mt-2 items-center justify-between font-medium text-gray-900 dark:text-white">
                            <div class="flex items-center justify-center">
                                <svg class="w-6 h-10 mr-4 text-gray-500  dark:text-gray-400  group-hover:text-purple-600 dark:group-hover:text-purple-500"
                                    fill="#9333ea" height="800px" width="800px" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 297.862 297.862" xml:space="preserve">
                                    <g>
                                        <path
                                            d="M182.845,117.396c0,3.039,2.463,5.503,5.502,5.503c3.039,0,5.504-2.464,5.504-5.503c0-18.886-17.234-34.515-39.414-36.759
               V70.106c0-3.039-2.465-5.504-5.504-5.504c-3.039,0-5.502,2.465-5.502,5.504v10.531c-22.185,2.244-39.42,17.873-39.42,36.759
               c0,18.884,17.235,34.509,39.42,36.753v51.993c-16.094-2.024-28.414-12.768-28.414-25.684c0-3.039-2.465-5.503-5.504-5.503
               c-3.039,0-5.502,2.464-5.502,5.503c0,18.887,17.235,34.515,39.42,36.759v10.547c0,3.039,2.463,5.503,5.502,5.503
               c3.039,0,5.504-2.464,5.504-5.503v-10.547c22.18-2.244,39.414-17.873,39.414-36.759c0-18.886-17.234-34.515-39.414-36.759V91.712
               C170.527,93.737,182.845,104.481,182.845,117.396z M115.017,117.396c0-12.915,12.32-23.659,28.414-25.684v51.361
               C127.337,141.049,115.017,130.309,115.017,117.396z M182.845,180.458c0,12.915-12.318,23.659-28.408,25.684v-51.367
               C170.527,156.799,182.845,167.543,182.845,180.458z" />
                                        <path
                                            d="M67.613,9.394c2.148-2.149,2.148-5.633,0-7.782c-2.149-2.148-5.634-2.149-7.783,0L24.607,36.834
               c0,0-0.001,0.002-0.002,0.002c-0.249,0.249-0.469,0.516-0.66,0.797c-1.243,1.824-1.265,4.23-0.069,6.077
               c0.093,0.143,0.191,0.281,0.298,0.416c0.02,0.024,0.035,0.05,0.055,0.074c0.071,0.088,0.151,0.17,0.228,0.254
               c0.051,0.054,0.096,0.111,0.148,0.164c0,0,0,0,0.001,0v0.001L60.26,80.266c1.074,1.074,2.482,1.611,3.891,1.611
               c1.409,0,2.817-0.537,3.892-1.611c2.149-2.149,2.149-5.634-0.001-7.783L41.784,46.231h227.581c3.039,0,5.503-2.465,5.503-5.504
               s-2.464-5.502-5.503-5.502H41.782L67.613,9.394z" />
                                        <path
                                            d="M230.25,288.467c-2.15,2.149-2.15,5.634,0,7.782c1.074,1.075,2.482,1.612,3.891,1.612s2.816-0.537,3.891-1.612
               l35.224-35.223c0,0,0.001-0.001,0.003-0.002c2.148-2.15,2.147-5.634-0.002-7.782l-35.654-35.641
               c-2.149-2.148-5.633-2.148-7.783,0.002c-2.148,2.148-2.147,5.633,0.002,7.782l26.256,26.245H28.497
               c-3.039,0-5.503,2.464-5.503,5.503c0,3.039,2.464,5.503,5.503,5.503H256.08L230.25,288.467z" />
                                    </g>
                                </svg>
                                <div>{{  config('transaction_types.typeTitles')[$transaction->type]  }} <strong>
                                        {{ $transaction->source ? $transaction->source->name : 'Admin'}}</strong>
                                    <br>
                                    <small
                                        class="text-gray-600">{{ $transaction->created_at->format('d/m H:i:s') }}</small>

                                </div>

                            </div>
                            <div>

                                <span
                                    class="text-{{ config('transaction_types.typeColors')[$transaction->type] }}">{{config('transaction_types.typeSymbols')[$transaction->type] }}
                                    {{ number_format($transaction->amount) }} <small>MMK</small> </span>
                            </div>
                        </a>

                    </div>
                @endforeach
                
            {{-- @endforeach --}}
            <ul class="pagination flex">
                {{ $transactions->links() }}
            </ul>

        </div>
    </div>


    @section('script')
        <script>
            $('ul.pagination').hide();
            $(function() {
                $('.infinite-scroll').jscroll({
                    autoTrigger: true,
                    loadingHtml: '<img class="mx-auto" width="50px" src="{{ asset('image/logo/animation_loading.gif') }}" alt="Loading..." />',
                    padding: 0,
                    nextSelector: '.pagination span.activeLink + a.pageLink',
                    contentSelector: 'div.infinite-scroll',
                    callback: function() {
                        $('ul.pagination').remove();
                    }
                });
            });
        </script>
    @endsection

</x-app-layout>
