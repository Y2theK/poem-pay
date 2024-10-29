@section('title', config('app.name'))
<x-app-layout>
    <div class="">
        {{-- <div class=''>
            <div class="">
                <div
                    class='flex max-w-xl my-3 shadow-lg border dark:border-gray-700 rounded-lg overflow-hidden mx-auto'>
                    <div class='flex items-center w-full'>
                        <div class='w-full'>
                            <div class="flex justify-between">
                                <x-posts.profile-bar :post=$randomPost />
                            </div>
                            <div class="border-b border-gray-100 dark:border-gray-800"></div>
    
                            <div class='text-gray-600 dark:text-gray-400 font-semibold text-lg mb-2 mt-3 mx-3 px-2'>
                                <a href="{{ route('posts.show', $randomPost) }}">
                                    {{ $randomPost->title }}
                                </a>
                            </div>
    
                            <div class='text-gray-500  dark:text-gray-400 text-sm mb-6 mx-3 px-2 hidden'
                                id="read-less-{{ $randomPost->id }}">{!! $randomPost->excerpt !!}
                            </div>
    
                            <div class='text-gray-500 text-sm mb-6 mx-3 px-2 ' id="read-more-{{ $randomPost->id }}">
                                {!! $randomPost->content !!}
                            </div>
    
                            <span class='text-blue-500 text-sm mb-3 mx-3  px-2 my-3 cursor-pointer block read-btn'
                                data-id={{ $randomPost->id }} id="read-btn-{{ $randomPost->id }}">Read less..</span>
    
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="">
            <x-posts.create-post-bar :user=$user></x-posts.create-post-bar>
            <div>
                @include('backend.layouts.flash')
            </div>
            <div class="infinite-scroll">
                @forelse($posts as $post)
                    <div class="">
                        @if ($post->is_shared == false)
                            <x-posts.post :post=$post :user=$user></x-posts.post>
                        @else
                            <x-posts.share-post :post=$post :user=$user></x-posts.share-post>
                        @endif
                    </div>
                @empty
                    <div class='flex max-w-xl my-3 bg-white shadow-md rounded-lg overflow-hidden mx-auto'>
                        <x-errors.not-found :message="'There is no posts yet. Go create the first one.'"></x-errors.not-found>
                    </div>
                @endforelse
                <ul class="pagination flex">
                    {{ $posts->links() }}
                </ul>
            </div>
        </div>
        {{-- <div class=''>
            <div class="">
                <div
                    class='flex max-w-xl my-3 shadow-lg border dark:border-gray-700 rounded-lg overflow-hidden mx-auto'>
                    <div class='flex items-center w-full'>
                        <div class='w-full'>
                            <div class="flex justify-between">
                                <x-posts.profile-bar :post=$randomPost />
                            </div>
                            <div class="border-b border-gray-100 dark:border-gray-800"></div>
    
                            <div class='text-gray-600 dark:text-gray-400 font-semibold text-lg mb-2 mt-3 mx-3 px-2'>
                                <a href="{{ route('posts.show', $randomPost) }}">
                                    {{ $randomPost->title }}
                                </a>
                            </div>
    
                            <div class='text-gray-500  dark:text-gray-400 text-sm mb-6 mx-3 px-2 hidden'
                                id="read-less-{{ $randomPost->id }}">{!! $randomPost->excerpt !!}
                            </div>
    
                            <div class='text-gray-500 text-sm mb-6 mx-3 px-2 ' id="read-more-{{ $randomPost->id }}">
                                {!! $randomPost->content !!}
                            </div>
    
                            <span class='text-blue-500 text-sm mb-3 mx-3  px-2 my-3 cursor-pointer block read-btn'
                                data-id={{ $randomPost->id }} id="read-btn-{{ $randomPost->id }}">Read less..</span>
    
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
       
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

            //reaction btn click ajax
            $(document).on('click', '.reaction-btn', function(e) {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('reactions.store') }}",
                    type: 'POST',
                    data: {
                        'id': id
                    },
                    success: function(res) {
                        let reactionSvg = $('#reaction-' + id).children()[0]; //to change reaction svg color
                        let reactionCount = $('#reaction-count-' + id).children()[
                            0]; //to change reaction ount
                        if (res.message === 'created') {
                            reactionSvg.setAttribute("fill", "red");
                            reactionSvg.setAttribute("stroke", "red");
                            reactionCount.textContent++;
                        } else {
                            reactionSvg.setAttribute("fill", "none");
                            reactionSvg.setAttribute("stroke", "currentColor");
                            reactionCount.textContent--;
                        }
                    }
                })
            });

            //saved btn click ajax
            $(document).on('click', '.saved-btn', function(e) {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('posts.save') }}",
                    type: 'POST',
                    data: {
                        'id': id
                    },
                    success: function(res) {
                        let savedSvg = $('#saved-' + id).children()[0]; //to change reaction svg color
                        if (res.message === 'created') {
                            savedSvg.setAttribute("fill", "white");
                        } else {
                            savedSvg.setAttribute("fill", "none");
                        }
                    }
                })
            });

            $(document).on('click', '.read-btn', function(e) {
                let id = $(this).data('id');
                $("#read-more-" + id).toggle();
                $("#read-less-" + id).toggle();
                if ($("#read-btn-" + id).text() == "Read more..")
                    $("#read-btn-" + id).text("Read less..");
                else
                    $("#read-btn-" + id).text("Read more..");
            });
        </script>

    @endsection
</x-app-layout>
