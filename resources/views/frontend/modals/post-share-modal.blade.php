<!-- Main modal -->
<div id="post-share-modal-{{ $post->id }}" tabindex="-1" aria-hidden="true"
class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full  max-h-full">
<div class="relative p-4 w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-900 dark:border-gray-700 ">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Share this Post
            </h3>
             
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="post-share-modal-{{ $post->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
       
        <!-- Modal body -->
        <form class="p-4 md:p-5" action={{ route('posts.share') }} method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <textarea id="title" rows="3" name="title" style="resize: none"
                        class="block p-2.5 w-full text-sm border-0 text-gray-900  bg-gray-50 rounded-lg   border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 focus:border-0"
                        placeholder="Write your thought here"></textarea>
                </div>
            </div>
       
            {{-- share post --}}
            <div class='share-post mb-2 mt-3 '>
                <div class="">
                    <div class='flex max-w-xl my-3 bg-white shadow-md rounded-lg overflow-hidden mx-auto dark:bg-gray-900 dark:border-gray-800'>
                        <div class='flex items-center w-full'>
                            <div class='w-full'>

                                <div class="border-b border-gray-100 dark:border-gray-800"></div>
                                <div class="flex flex-row mt-2 px-2 py-3 mx-3">
                                    <div class="w-auto h-auto">
                                        <img class='w-10 h-10 object-cover rounded-full shadow cursor-pointer'
                                            alt='User avatar'
                                            src='{{ $post->user?->getAvatarPath() }}'>
                                    </div>
                                    <div class="flex flex-col mb-2 ml-4 mt-1">
                                        <div class='text-gray-600 text-xs font-semibold'>{{ $post->user?->name }}</div>
                                        <div class='flex w-full mt-1'>
                                            <div class='text-blue-700 font-base  mr-1 cursor-pointer'
                                                style="font-size:10px;">
                                                #{{ $post->id }}
                                            </div>
                                            <div class='text-gray-400' style="font-size:10px;">
                                                • {{ $post->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b border-gray-100 dark:border-gray-800"></div>
                                <div class='text-gray-600 font-semibold text-lg mb-2 mt-3 mx-3 px-2'>
                                    {{ $post->title }}</div>
                                {{-- <div class='text-gray-400 font-medium text-sm mb-7 mt-3 mx-3 px-2'><img
                                        class="rounded" src="https://picsum.photos/536/354"></div> --}}
                                <div class='text-gray-500 text-sm mb-6 mx-3 px-2'>
                                {!! $post->excerpt !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="text-white inline-flex items-center bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Share
            </button>
        </form>
       
    </div>
</div>
</div>

