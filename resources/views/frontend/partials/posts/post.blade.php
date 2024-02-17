<div class='flex max-w-xl my-3 bg-white shadow-md rounded-lg overflow-hidden mx-auto'>
    <div class='flex items-center w-full'>
        <div class='w-full'>
            <div>
                @include('frontend.partials.posts.profile-bar')
            </div>
            <div class="border-b border-gray-100"></div>
            <div class='text-gray-600 font-semibold text-lg mb-2 mt-3 mx-3 px-2'>
                {{ $post->title }}
            </div>
            <div class='text-gray-500 font-thin text-sm mb-6 mx-3 px-2'>{!! $post->content !!}
            </div>
            <div>
                @include('frontend.partials.posts.save-share-react-bar')
            </div>
            <div>
                @include('frontend.partials.posts.data-count-bar')
            </div>
            <div>
                @include('frontend.partials.posts.comment-bar')
            </div>

        </div>
    </div>
</div>
