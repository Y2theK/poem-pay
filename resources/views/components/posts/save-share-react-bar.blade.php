 <div class="flex justify-start mb-4 border-t border-gray-100 dark:border-gray-900">
     <div class="flex w-full mt-1 pt-2 pl-5">
         {{-- react btn --}}
         <span data-id={{ $post->id }} id="reaction-{{ $post->id }}"
             class="reaction-btn bg-white dark:bg-gray-900 transition ease-out duration-300 hover:text-red-500  border border-gray-500 dark:border-gray-600 w-8 h-8 px-2 pt-2 text-center rounded-full text-gray-400 cursor-pointer mr-2">
             <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $post->auth_user_reactions_count ? 'red' : 'none' }}"
                 width="15px" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="{{ $post->auth_user_reactions_count ? 'red' : 'currentColor' }}">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
             </svg>

         </span>
         <img class="inline-block object-cover w-8 h-8 text-white border-2 border-white dark:border-gray-600 rounded-full shadow-sm cursor-pointer"
             src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
             alt="" />
         <img class="inline-block object-cover w-8 h-8 -ml-2 text-white border-2 border-white dark:border-gray-600 rounded-full shadow-sm cursor-pointer"
             src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
             alt="" />
         <img class="inline-block object-cover w-8 h-8 -ml-2 text-white border-2 border-white dark:border-gray-600 rounded-full shadow-sm cursor-pointer"
             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
             alt="" />
         <img class="inline-block object-cover w-8 h-8 -ml-2 text-white border-2 border-white dark:border-gray-600 rounded-full shadow-sm cursor-pointer"
             src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
             alt="" />
     </div>
     <div class="flex justify-end w-full mt-1 pt-2 pr-5">
         {{-- share btn --}}
         <span data-modal-target="post-share-modal-{{ $post->id }}"
             data-modal-toggle="post-share-modal-{{ $post->id }}"
             class="transition ease-out duration-300 hover:bg-blue-50 bg-blue-100 h-8 px-2 py-2 text-center rounded-full text-blue-400 cursor-pointer mr-2">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="14px" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
             </svg>
         </span>
         {{-- saved btn --}}
         <span data-id={{ $post->id }} id="saved-{{ $post->id }}"
             class="saved-btn transition ease-out duration-300 hover:bg-blue-500 bg-blue-600 h-8 px-2 py-2 text-center rounded-full text-gray-100 cursor-pointer">
             <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $post->auth_user_saved_post_count ? 'white' : 'none' }}"
                 width="14px" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
             </svg>
         </span>
     </div>
 </div>
 @include('frontend.modals.post-share-modal')
