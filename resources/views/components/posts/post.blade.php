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
            <div class='text-gray-500 text-sm mb-6 mx-3 px-2' id="read-less-{{ $post->id }}">{!! $post->excerpt !!}
            </div>

            <div class='text-gray-500 text-sm mb-6 mx-3 px-2 hidden' id="read-more-{{ $post->id }}">{!! $post->content !!}
            </div>

            <div class='text-blue-500 text-sm mb-6 mx-3 px-2 cursor-pointer read-btn' data-id={{ $post->id }} id="read-btn-{{ $post->id }}">Read more..</div>
           
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
            url : "{{ route('saved_posts.store')}}",
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

    </script>
@endpush