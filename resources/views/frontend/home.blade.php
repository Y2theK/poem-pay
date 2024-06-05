@section('title', config('app.name'))
<x-app-layout>
    <div>
        <x-posts.create-post-bar :user=$user></x-posts.create-post-bar>
        <div>
            @include('backend.layouts.flash')
        </div>
        <div class="infinite-scroll">
            @foreach ($posts as $post)
                <div class="">
                    @if ($post->is_shared == false)
                        <x-posts.post :post=$post :user=$user></x-posts.post>
                    @else
                        <x-posts.share-post :post=$post :user=$user></x-posts.share-post>
                    @endif
                </div>
            @endforeach
            <ul class="pagination flex">
                {{ $posts->links() }}
            </ul>
        </div>
    <div>
@section('script')
    <script>
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="mx-auto" width="50px" src="{{ asset('image/animation_loading.gif') }}" alt="Loading..." />',
                padding: 0,
                nextSelector: 'a[rel="next"]',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
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
