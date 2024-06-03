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
        });
    </script>

@endsection
</x-app-layout>
