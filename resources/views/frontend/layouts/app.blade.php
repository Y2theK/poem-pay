<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    {{-- line awesome --}}
    <link rel="stylesheet"href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    {{-- tailwind cdn --}}
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="antialiased text-sm md:text-md">
    <div class="min-h-screen bg-gray-100">
        <!-- Top Bar -->
        <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
           @include('frontend.layouts.partials.top-bar')
        </nav>

        <!-- Page Content -->
        <main class="p-5">
            {{ $slot }}
        </main>

        {{-- Button Navigation --}}
        <div class="flex justify-center mt-36 text-xs">
            @include('frontend.layouts.partials.bottom-navigation')
        </div>

    </div>

    @yield('modal')
    <!-- jQuery -->
    <script  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    {{-- sweetalert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    {{-- flowbit js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    
    {{-- jscroll cdn --}}
    {{-- <script src="//unpkg.com/jscroll/dist/jquery.jscroll.min.js"></script> --}}
    <script src="{{ asset('js/jscroll.min.js') }}"></script>

    {{-- tinymce editor --}}
    <script src="https://cdn.tiny.cloud/1/wf8k5o3mso4q2c2nca7ssnvp8t130napv0t24475aog81h7s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <script>
   
        $('.back-btn').on('click', function() {
            window.history.go(-1);
            return false;
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        //tinymce init
        tinymce.init({
            selector: '.tiny-textarea',
            ui_mode: 'split',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
        //setup csrf token for all ajax requests
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if(token){
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : token.content,
                }
            });
        }
        
    </script>

    @if (session('created'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('created') }}'
            })
    @elseif (session('updated'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('updated') }}'
        })
    @elseif (session('saved'))
        Toast.fire({
                icon: 'success',
                title: '{{ session('saved') }}'
            })
    @endif

    @yield('script')


</body>

</html>
