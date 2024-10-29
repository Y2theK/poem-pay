<!-- Share Post -->
<div class="">
    <div class='flex max-w-xl my-3 bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mx-auto'>
        <div class='flex items-center w-full'>
            <div class='w-full'>
                <div>
                    <x-posts.share-post-profile-bar :post=$post  />
                </div>
                <div class="border-b border-gray-100 dark:border-gray-900"></div>
                {{-- <div class='text-gray-600 font-semibold text-lg mb-2 mt-3 mx-3 px-2'>Share this post for better
                            reach</div> --}}
                <div class='text-gray-500 text-sm mb-2 mt-3 mx-3 px-2  dark:text-gray-400'>
                    {{ $post->shared_title }}
                </div>
                {{-- share post --}}
                <div class='share-post mb-2 mt-3 mx-3 px-2'>
                    <div class="">
                        <div class='flex max-w-xl my-3 bg-white dark:bg-gray-800 shadow-lg border dark:border-gray-700 rounded-lg overflow-hidden mx-auto'>
                            <div class='flex items-center w-full'>
                                <div class='w-full'>

                                    <div>
                                        <x-posts.profile-bar :post=$post/>
                                    </div>
                                    <div class="border-b border-gray-100 dark:border-gray-900"></div>

                                    <div class='text-gray-600 dark:text-gray-400 font-semibold text-lg mb-2 mt-3 mx-3 px-2'>
                                        <a href="{{ route('posts.show',$post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </div>

                                    <div class='text-gray-500  dark:text-gray-400 text-sm mb-6 mx-3 px-2' id="read-less-{{ $post->id }}">{!! $post->excerpt !!}
                                    </div>
                        
                                    <div class='text-gray-500 text-sm mb-6 mx-3 px-2 hidden' id="read-more-{{ $post->id }}">{!! $post->content !!}
                                    </div>
                        
                                    <span class='text-blue-500 text-sm mb-3 mx-3  px-2 my-3 cursor-pointer block read-btn' data-id={{ $post->id }} id="read-btn-{{ $post->id }}">Read more..</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- share post --}}
                <div>
                    <x-posts.save-share-react-bar :post=$post />
                </div>
                <div>
                    <x-posts.data-count-bar :post=$post />
                </div>
                <div>
                    <x-posts.comment-bar :post=$post :user=$user/>
                </div>
                
            </div>
        </div>
    </div>
</div>
@push('child-script')
    <script>
        // toggle excerpt and content
        $(document).on('click','.read-btn',function(e){
            let id = $(this).data('id');
            $("#read-more-" + id).toggle();
            $("#read-less-" + id).toggle();
            if($("#read-btn-" + id).text() == "Read more..")
                $("#read-btn-" + id).text("Read less..");
            else
                $("#read-btn-" + id).text("Read more..");

        });

    </script>
@endpush