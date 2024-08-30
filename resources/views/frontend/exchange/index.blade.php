@section('title', 'Exchange')
<x-app-layout>
    <div
        class="mx-auto w-full py-14 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-10">
        <div class="flex justify-center">
            <h1 class="text-2xl font-mono font-bold text-purple-500"> Exchange Rate </h1>
        </div>
        <div class="text-center mt-4 font-mono text-purple-500 md:flex justify-center items-center">
            <p class="mx-3"> {{ __('1 Like : ') }} {{ $config->reaction_rate }} MMK</p>
            <p class="mx-3"> {{ __('1 Comment :') }} {{ $config->comment_rate }} MMK</p>
            <p class="mx-3"> {{ __('1 Share :') }} {{ $config->share_rate }} MMK</p>
        </div>
    </div>
    {{-- Exchangable lists --}}
    <div class="infinite-scroll">
        <div class="flex justify-center flex-col items-center">


            @forelse ($posts as $post)
                <div
                    class="w-full  mb-2 py-5 px-3 max-w-5xl {{ $post->is_exchanged ? 'bg-white' : 'bg-gray-100' }} border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative orderflow-hidden">

                   
                    <a href="{{ $post->is_exchanged ? route('exchange.log', $post->id) : route('exchange.show', $post->id) }}"
                        class="flex  cursor-pointer mt-2 items-center justify-between font-medium text-gray-900 dark:text-white">

                        <div class="flex w-full justify-between items-center">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                            <!DOCTYPE svg
                                PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg class="d-none md:d-block w-6 h-6 mr-2 mt-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500"
                                fill="{{ $post->is_exchanged ? '#4caf50' : '#9333ea' }}" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 182.026 182.026" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M31.859,91.005c0-29.508,21.753-53.977,50.061-58.382v12.881l36.396-22.755L81.913,0v14.222
                                            c-38.388,4.545-68.266,37.218-68.266,76.784c0,27.809,14.789,52.153,36.849,65.778l17.853-11.141
                                            C46.939,136.717,31.859,115.602,31.859,91.005z" />
                                        <path
                                            d="M131.525,25.237l-17.851,11.157c21.418,8.892,36.499,30.012,36.499,54.611c0,29.532-21.749,53.985-50.058,58.396v-12.887
                                            l-36.402,22.764l36.402,22.747v-14.244c38.386-4.53,68.263-37.199,68.263-76.776C168.379,63.207,153.59,38.865,131.525,25.237z" />
                                        <path
                                            d="M95.401,130.802v-9.942c11.204-1.953,17.362-9.362,17.362-18.041c0-8.777-4.679-14.134-16.275-18.241
                                            c-8.298-3.121-11.716-5.166-11.716-8.383c0-2.733,2.045-5.464,8.395-5.464c7.015,0,11.496,2.235,14.041,3.319l2.819-11.023
                                            c-3.203-1.557-7.602-2.919-14.131-3.208v-8.586h-9.562v9.261c-10.42,2.041-16.473,8.777-16.473,17.355
                                            c0,9.458,7.123,14.344,17.568,17.846c7.204,2.441,10.323,4.782,10.323,8.493c0,3.896-3.796,6.041-9.354,6.041
                                            c-6.336,0-12.093-2.048-16.183-4.29l-2.925,11.411c3.693,2.148,10.041,3.899,16.569,4.189v9.264H95.401z" />
                                    </g>
                                </g>
                            </svg>
                            
                            <div class="w-full flex justify-between items-center">
                                
                                <div>
                                    <p class="font-bold p-0 text-sm md:text-md  mb-2 text-purple-500">
                                        {{ $post->title }}
                                    </p>
                                    {{-- <p class="text-muted text-xs mt-1 ">
                                        {{ Str::limit($post->excerpt, 100, '...') }}
                                    </p> --}}
                                    <div class="md:flex"> 
                                        <p class="text-gray-600 mr-3"><small>Like : {{ $post->reactions_count }}</small> </p>
                                        <p class="text-gray-600 mr-3"><small>Comment : {{ $post->comments_count }}</small> </p>
                                        <p class="text-gray-600 mr-3"><small>Share : {{ $post->shares_count }}</small></p>

                                    </div>
                                   

                                </div>
                                    <div class="">

                                        @php
                                            $totalExchangableRate =
                                                $post->reactions_count * $config->reaction_rate +
                                                $post->comments_count * $config->comment_rate +
                                                $post->shares_count * $config->share_rate;
                                        @endphp
                                        <x-button class="text-center"  type="button">
                                            {{ $post->is_exchanged ? 'Exchanged - ' : '' }}
                                            {{ $totalExchangableRate }} MMK
                                            <span><i class="las la-angle-right"></i></span>
                                        </x-button>
                                    </div>



                            </div>

                        </div>

                    </a>

                </div>

            @empty
                <x-errors.not-found :message="'There is no exchanagable posts.'"></x-errors.not-found>
            @endforelse

            {{-- @endforeach --}}
            <ul class="pagination flex">
                {{ $posts->links() }}
            </ul>

        </div>


    </div>

    @section('script')
        <script>
            $('ul.pagination').hide();
            $(function() {
                $('.infinite-scroll').jscroll({
                    autoTrigger: true,
                    loadingHtml: '<img class="mx-auto" width="50px" src="{{ asset('image/animation_loading.gif') }}" alt="Loading..." />',
                    padding: 0,
                    nextSelector: 'a[rel="next"]',
                    contentSelector: 'div.infinite-scroll',
                    callback: function() {
                        $('ul.pagination').remove();
                    }
                });
            });
        </script>
    @endsection

</x-app-layout>
