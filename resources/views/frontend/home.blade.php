@section('title', 'Magic Pay')
<x-app-layout>
    <div>
        <x-posts.create-post-bar :user=$user></x-posts.create-post-bar>
   
        <div class="infinite-scroll">
            @foreach ($posts as $post)
                <div class="">
                <x-posts.post :post=$post :user=$user></x-posts.post>
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
            $(document).on('click','.reaction-btn',function(e){
                let id = $(this).data('id');
                //   $('.reaction-btn').disabled();
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
        });
    </script>

@endsection
</x-app-layout>
