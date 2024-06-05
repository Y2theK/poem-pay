  <div class="flex flex-row mt-2 px-2 py-3 mx-3">
      <div class="w-auto h-auto rounded-full border-2 border-purple-500">
          <img class='w-12 h-12 object-cover rounded-full shadow cursor-pointer' alt='User avatar'
              src={{ $post->user?->getAvatarPath() }}>
      </div>
      <div class="flex flex-col mb-2 ml-4 mt-1">
          <div class='text-gray-600 text-sm font-semibold'>{{ $post->user?->name }}</div>
          <div class='flex w-full mt-1'>
              <div class='text-blue-700 font-base text-xs mr-1 cursor-pointer'>
                  #{{ $post->id }}
              </div>
              <div class='text-gray-800 text-xs'>
                  • {{ $post->created_at->diffForHumans() }}
              </div>
          </div>
      </div>
  </div>
