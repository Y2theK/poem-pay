<!-- This is an create post component -->
<div class="" data-modal-target="post-create-modal" data-modal-toggle="post-create-modal">
    <div class='flex max-w-xl bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mx-auto'>
        <div class='flex items-center w-full'>
            <div class='w-full'>

                <div class="border-b border-gray-100 dark:border-gray-800"></div>

                <div
                    class="relative flex items-center self-center w-full max-w-xl p-4 overflow-hidden text-gray-600 focus-within:text-gray-400">
                    <img class='w-10 h-10 object-cover rounded-full shadow mr-2 cursor-pointer' alt='User avatar'
                        src='{{ $user->getAvatarPath() }}'>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-6">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-none hover:text-blue-500">
                        </button>
                    </span>
                    <input type="search"
                        class="w-full  py-2 pl-4 pr-10 text-sm bg-gray-100 dark:bg-gray-900 border border-transparent appearance-none rounded-tg placeholder-gray-400 focus:bg-white focus:outline-none focus:border-purple-500 focus:text-gray-900 focus:shadow-outline-purple"
                        style="border-radius: 25px" placeholder="What’s been occupying your thoughts?" autocomplete="off">
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.modals.post-create-modal')