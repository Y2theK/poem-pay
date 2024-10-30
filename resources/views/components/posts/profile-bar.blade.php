<div class="flex items-center justify-between ">

    <div class="flex flex-row mt-2 px-2 py-3 mx-3">
        <div class="w-auto h-auto rounded-full border-2 border-purple-500">
            <img class='w-12 h-12 object-cover rounded-full shadow cursor-pointer' alt='User avatar'
                src={{ $post->user?->getAvatarPath() }}>
        </div>
        <div class="flex flex-col mb-2 ml-4 mt-1">
            <div class='text-gray-600 dark:text-gray-200 text-sm font-semibold'>{{ $post->user?->name }}</div>
            <div class='flex w-full mt-1'>
                <div class='text-blue-700 font-base text-xs mr-1 cursor-pointer'>
                    #{{ $post->id }}
                </div>
                <div class='text-gray-800 dark:text-gray-100 text-xs'>
                    • {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
    @if ($post->user_id === auth()->id())
        <div class="flex flex-row mt-2 px-2 py-3 mx-3">
                
            <a href="{{ route('posts.edit',$post) }}">
                <div class="shrink-0  w-4  cursor-pointer text-purple-500 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </div> 
            </a>
            <form action="{{ route('posts.destroy',$post) }}" method="POST">
                @method('DELETE')
                    @csrf
                    <button type="submit">
                        <div class="shrink-0  w-4 cursor-pointer text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                              </svg>
                     </div> 
                    </button>
            </form>
        </div>
    @endif


   
  </div>