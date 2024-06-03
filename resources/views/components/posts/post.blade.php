<div class='flex max-w-xl my-3 bg-white shadow-md rounded-lg overflow-hidden mx-auto'>
    <div class='flex items-center w-full'>
        <div class='w-full'>
            <div>
                <x-posts.profile-bar :post=$post/>
            </div>
            <div class="border-b border-gray-100"></div>
            <div class='text-gray-600 font-semibold text-lg mb-2 mt-3 mx-3 px-2'>
                {{ $post->title }}
            </div>
            <div class='text-gray-500 text-sm mb-6 mx-3 px-2'>{!! $post->excerpt !!}
            </div>
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
