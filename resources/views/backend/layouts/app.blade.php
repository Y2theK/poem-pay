<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

	<link rel="stylesheet" href="{{ asset('backend/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('backend/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    {{-- <script src="{{ asset('backend/js/charts-lines.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('backend/js/charts-pie.js') }}" defer></script> --}}
   
    {{-- line awesome --}}
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">

	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">


	{{-- <link href="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.min.css" rel="stylesheet"> --}}

    <!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="{{ asset('css/tailwind-datatable.css') }}">
	
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('backend.layouts.sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('backend.layouts.header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        @yield('breadcrumb')
                    </h2>
                    @yield('content')

                </div>
            </main>
        </div>
    </div>
    <!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	{{-- mark js datatable--}}
	<script src="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js"></script>
	<script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js)"></script>
	{{-- flowbit js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
	{{-- jsvalidation --}}
	<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
	{{-- sweetalert 2 --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	
	<script type="text/javascript">
	$(function ($) {
		$.extend($.fn.dataTable.defaults, {
					responsive: true,
					serverSide: true,
					processing : true,
					ajax: {},
					mark: true,
					"columnDefs": [
						{
							"targets": 'no-sort',
							"orderable": false,
						},
						{
							"targets": 'no-search',
							"searchable": false,
						},
						{
							"targets": 'hidden',
							"visible": false,
						}
                	],
					language: {
						"search": "<span class='text-purple-600 font-medium'>Search</span>",
						"processing": "<span style='display: flex;justify-content: center;'><img src='/image/animation_loading.gif' style='width:100px' /></span>",

					},

		});


		$('.back-btn').on('click',function(){
			window.history.go(-1);
			return false;
		});


		//setup csrf token for all ajax requests
		let token = document.head.querySelector('meta[name="csrf-token"]');

		if(token){
			$.ajaxSetup({
				headers : {
					'X_CSRF_TOKEN' : token.content
				}
			});
		}

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
	@elseif (session('fail'))
		Toast.fire({
		icon: 'danger',
		title: '{{ session('fail') }}'
		})
	
	@endif

	
	</script>
	@yield('script')

</body>

</html>
