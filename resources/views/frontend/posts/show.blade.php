@section('title', 'Poem Details')
<x-app-layout>
    <div>
        <div class="">
            @if ($post->is_shared == false)
                <x-posts.post :post=$post :user=$user></x-posts.post>
            @else
                <x-posts.share-post :post=$post :user=$user></x-posts.share-post>
            @endif
           
           
        </div>
        <div class='flex max-w-xl my-3 bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mx-auto'>
            <div class='flex items-center w-full'>
                <div class='w-full'>
                    <div>
                        @foreach ($post->comments as $comment)
                        <div
                            class="relative border dark:border-gray-700  dark:bg-gray-900 flex items-center self-center w-full max-w-xl p-4 overflow-hidden text-gray-600 dark:text-gray-200 focus-within:text-gray-400">
                            <img class='w-10 h-10 object-cover rounded-full shadow mr-2 cursor-pointer' alt='User avatar'
                                src={{ $comment->user->getAvatarPath() }}>
                            <div class="px-3">
                                {{ $comment->content }}
                            </div>
                            @if (auth()->id() === $comment->user_id)
                                <div class="ml-auto">
                                    <form action="{{ route('posts.comment.destroy',[$post,$comment]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">
                                            <div class="shrink-0  w-4 back-btn cursor-pointer">
                                                <div class="shrink-0  w-4 back-btn cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                      </svg>
                                                                         
                                                 </div>                      
                                             </div> 
                                        </button>
                                    </form>
                                </div>
                            @endif
                           
                        </div>
                        {{-- <hr /> --}}
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    <div>
@section('script')
    <script>

         //reaction btn click ajax
         $(document).on('click','.reaction-btn',function(e){
            let id = $(this).data('id');
            $.ajax({
            url : "{{ route('reactions.store')}}",
            type : 'POST',
            data : { 'id': id },
                success : function(res){
                    let reactionSvg = $('#reaction-'+id).children()[0]; //to change reaction svg color
                    let reactionCount = $('#reaction-count-'+id).children()[0]; //to change reaction ount
                    if(res.message === 'created'){
                        reactionSvg.setAttribute("fill", "red");
                        reactionSvg.setAttribute("stroke", "red");
                        reactionCount.textContent++;
                    }else{
                        reactionSvg.setAttribute("fill", "none");
                        reactionSvg.setAttribute("stroke", "currentColor");
                        reactionCount.textContent--;
                    }
                }
            })
        });

        //saved btn click ajax
        $(document).on('click','.saved-btn',function(e){
            let id = $(this).data('id');
            $.ajax({
            url : "{{ route('posts.save')}}",
            type : 'POST',
            data : { 'id': id },
                success : function(res){
                    let savedSvg = $('#saved-'+id).children()[0]; //to change reaction svg color
                    if(res.message === 'created'){
                        savedSvg.setAttribute("fill", "white");
                    }else{
                        savedSvg.setAttribute("fill", "none");
                    }
                }
            })
        });

        // $(document).on('click','.read-btn',function(e){
        //     let id = $(this).data('id');
        //     $("#read-more-" + id).toggle();
        //     $("#read-less-" + id).toggle();
        //     if($("#read-btn-" + id).text() == "Read more..")
        //         $("#read-btn-" + id).text("Read less..");
        //     else
        //         $("#read-btn-" + id).text("Read more..");

        // });
    </script>

@endsection
</x-app-layout>
