@section('title', 'Poem Details')
<x-app-layout>
    <div>
        <div class="">
            @if ($post->is_shared == false)
                <x-posts.post :post=$post :user=$user></x-posts.post>
            @else
                <x-posts.share-post :post=$post :user=$user></x-posts.share-post>
            @endif
            {{-- @foreach ($post->comments as $comment)
                {{ $comment->content }}
            @endforeach --}}
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

        $(document).on('click','.read-btn',function(e){
            let id = $(this).data('id');
            $("#read-more-" + id).toggle();
            $("#read-less-" + id).toggle();
            if($("#read-btn-" + id).text() == "Read more..")
                $("#read-btn-" + id).text("Read less..");
            else
                $("#read-btn-" + id).text("Read more..");

        });
    </script>

@endsection
</x-app-layout>
