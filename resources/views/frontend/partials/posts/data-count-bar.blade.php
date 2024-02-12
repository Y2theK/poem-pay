<div class="flex w-full border-t border-gray-100">
    <div class="mt-3 mx-5 flex flex-row">
        <div class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>
            Comments:<div class="ml-1 text-gray-400 font-thin text-ms">
                {{ $post->comments_count }}</div>
        </div>
        <div class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>
            Views: <div class="ml-1 text-gray-400 font-thin text-ms">
                {{ rand(300, 1000) }}
            </div>
        </div>
    </div>
    <div class="mt-3 mx-5 w-full flex justify-end">
        <div id="reaction-count-{{ $post->id }}" class='flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center'>
            Likes: <div class="ml-1 text-gray-400 font-thin text-ms" >
                {{ $post->reactions_count }}</div>
        </div>
    </div>
</div>
