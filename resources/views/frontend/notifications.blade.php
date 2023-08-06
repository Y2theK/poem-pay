@section('title', 'Transactions')
<x-app-layout>

    {{-- Transactions lists --}}
    <div class="infinite-scroll">
        <div class="flex justify-center flex-col items-center">
            {{-- @foreach ($transactions as $month => $monthly_transactions) --}}
            {{-- {{ $month }} --}}
            @foreach ($notifications as $notification)
                <div
                    class="w-full  mb-2 py-2 px-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <a href="{{ route('notifications.detail', $notification->id) }}"
                        class="flex cursor-pointer mt-2 items-center justify-between font-medium text-gray-900 dark:text-white">
                        <div class="flex w-full">
                            <svg class="d-none md:d-block w-6 h-6 mr-2 mt-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500"
                                viewBox="0 0 24 24" fill="{{ $notification->read_at ? 'none' : '#ef4444'  }}" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.31317 12.463C6.20006 9.29213 8.60976 6.6252 11.701 6.5C14.7923 6.6252 17.202 9.29213 17.0889 12.463C17.0889 13.78 18.4841 15.063 18.525 16.383C18.525 16.4017 18.525 16.4203 18.525 16.439C18.5552 17.2847 17.9124 17.9959 17.0879 18.029H13.9757C13.9786 18.677 13.7404 19.3018 13.3098 19.776C12.8957 20.2372 12.3123 20.4996 11.701 20.4996C11.0897 20.4996 10.5064 20.2372 10.0923 19.776C9.66161 19.3018 9.42346 18.677 9.42635 18.029H6.31317C5.48869 17.9959 4.84583 17.2847 4.87602 16.439C4.87602 16.4203 4.87602 16.4017 4.87602 16.383C4.91795 15.067 6.31317 13.781 6.31317 12.463Z"
                                    stroke="#9333ea" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.42633 17.279C9.01212 17.279 8.67633 17.6148 8.67633 18.029C8.67633 18.4432 9.01212 18.779 9.42633 18.779V17.279ZM13.9757 18.779C14.3899 18.779 14.7257 18.4432 14.7257 18.029C14.7257 17.6148 14.3899 17.279 13.9757 17.279V18.779ZM12.676 5.25C13.0902 5.25 13.426 4.91421 13.426 4.5C13.426 4.08579 13.0902 3.75 12.676 3.75V5.25ZM10.726 3.75C10.3118 3.75 9.97601 4.08579 9.97601 4.5C9.97601 4.91421 10.3118 5.25 10.726 5.25V3.75ZM9.42633 18.779H13.9757V17.279H9.42633V18.779ZM12.676 3.75H10.726V5.25H12.676V3.75Z"
                                    fill="#9333ea" />

                            </svg>
                            <div class="w-full">
                                <p class="font-bold p-0 text-xs md:text-md truncate">
                                    {{-- {{ Str::limit($notification->data['title'], 30, '...') }} --}}
                                    {{ $notification->data['title'] }}
                                </p>
                                {{-- <br> --}}
                                <p class="text-muted text-xs mt-1 truncate">
                                    {{ $notification->data['message']  }}
                                    {{-- {{ Str::limit($notification->data['message'] , 50, '...')  }} --}}
                                </p>
                                {{-- <br> --}}
                                <p class="text-right">
                                    <small class="text-gray-600">{{ $notification->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                            
                        </div>
                    </a>

                </div>
            @endforeach

            {{-- @endforeach --}}
            <ul class="pagination flex">
                {{ $notifications->links() }}
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
