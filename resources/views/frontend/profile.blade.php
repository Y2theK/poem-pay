@section('title', 'Profile')
<x-app-layout>
    @include('backend.layouts.flash')
    <div class="flex items-center justify-center mb-5 ">
        <form method="POST" action="{{ route('profile_image_upload') }}" class="profile-image-form" enctype="multipart/form-data">
        @csrf
        <label for="dropzone-file" class="profile-img flex flex-col items-center justify-center w-30 h-30  rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex relative flex-col items-center justify-center ">
                <svg class="upload-icon hidden absolute bottom-50 left-50 right-50 top-50  w-8 h-8 opacity-50 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                @if ($user->avatar)
                <img class="w-20 h-20 border-2 text-center border-purple-600 object-center  rounded-full shadow-lg"
                    src={{ asset('storage/'.$user->avatar) }}
                    alt="{{ $user->name }}" />
                @else
                    <img class="w-20 h-20 border-2 text-center border-purple-600  rounded-full shadow-lg"
                    src="https://ui-avatars.com/api/?name={{ $user->name }}&background=ffffff"
                    alt="{{ $user->name }}" />
                @endif
               
            </div>
            <input id="dropzone-file" type="file" class="hidden" name="avatar" />
        </label>
        </form>
    </div> 
    {{-- <div class="flex justify-center">
    <img class="w-20 h-20 border-2 text-center border-purple-600 mb-5 rounded-full shadow-lg"
    src="https://ui-avatars.com/api/?name={{ $user->name }}&background=ffffff"
    alt="{{ $user->name }}" />
    </div> --}}
    {{-- Profile Card --}}
    <div class="flex justify-center">
        <div
            class="w-full py-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            
            <div class="flex flex-col items-center py-4">
               

                <div class="w-full px-5 ">
                    <div class=" flex my-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>Name</span> <span>{{ $user->name }}</span>
                    </div>
                    <hr>
                    <div class=" flex my-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>Email</span> <span>{{ $user->email }}</span>
                    </div>
                    <hr>
                    <div class=" flex mt-4 mb-0 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>Phone</span> <span>{{ $user->phone }}</span>
                    </div>
                    {{-- <hr> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Profile Action --}}
    <div class="flex justify-center mt-5">
        <div
            class="w-full  max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('update_password') }}"
                class="flex cursor-pointer my-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                <span>Update Password</span> <span><i class="las la-angle-right"></i></span>
            </a>
            <hr>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a id="logout"
                    class="flex logout cursor-pointer my-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                    <span>Logout</span> <span><i class="las la-angle-right"></i></span>
                </a>
            </form>
        </div>
    </div>
    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type=file]').change(function(){
              $('.profile-image-form').submit();
            })

            $(document).on('click','.logout',function(e){
             
                e.preventDefault();
               
                Swal.fire({
                    title: 'Are you sure to logout?',
                    showCancelButton: true,
                    reverseButtons : true,
                    confirmButtonColor: 'bg-purple-600',
                    confirmButtonText: 'Logout'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
@endsection

</x-app-layout>
