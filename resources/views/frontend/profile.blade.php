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
                    <img class="w-20 h-20 border-2 text-center border-purple-600  rounded-full shadow-lg object-center"
                    src={{ $user->avatar ?  asset('storage/'.$user->avatar) : "https://ui-avatars.com/api/?name=$user->name&background=ffffff" }}
                    alt="{{ $user->name }}" />
                
            </div>
            <input id="dropzone-file" type="file" class="hidden" name="avatar" accept="image/*" />
        </label>
        </form>
    </div> 
    
    {{-- Profile Card --}}
    <div class="flex justify-center">
        <div
            class="w-full py-5 max-w-5xl bg-white border border-gray-200  rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            
            <div class="flex flex-col items-center py-4">
               

                <div class="w-full px-5 ">
                    <div class=" flex py-4 border-b border-gray-200 dark:border-gray-700  px-1 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>Name</span> <span>{{ $user->name }}</span>
                    </div>
                    <div class=" flex py-4 border-b border-gray-200 dark:border-gray-700 px-1 justify-between text-md font-medium text-gray-900 dark:text-white">
                        <span>Email</span> <span>{{ $user->email }}</span>
                    </div>
                    <div class=" flex pt-4 mb-0 px-1 justify-between text-md font-medium text-gray-900 dark:text-white">
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
            class="w-full  max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700 ">
            <a href="{{ route('update_password') }}"
                class="flex cursor-pointer border-b py-4  border-gray-200 dark:border-gray-700 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                <span>Update password</span>
                <div class="shrink-0  w-4 back-btn cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                      </svg>                      
                 </div>
            </a>
            {{-- <hr>s --}}
            <a href="{{ route('my_saved_posts') }}"
                class="flex cursor-pointer border-b py-4 border-gray-200 dark:border-gray-700  px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                <span>Saved posts</span>
                <div class="shrink-0  w-4 back-btn cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                      </svg>                      
                 </div>
            </a>
            {{-- <hr> --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a data-modal-target="logout-modal" data-modal-toggle="logout-modal" 
                    class="flex cursor-pointer py-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                    <span>Logout</span> 
                    <div class="shrink-0  w-4 back-btn cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                          </svg>                      
                     </div>
                </a>
                <div id="logout-modal" tabindex="-1" class="fixed top-40 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-900 border border-white dark:border-gray-800">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="logout-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="#9333ea" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you to log out?</h3>
                               <div class="text-right"></div>
                                <button data-modal-hide="logout-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                <button data-modal-hide="logout-modal" type="button" class="logout text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                                </button>
                                </div>
                            </div>
                        </div>
                </div>
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
                this.closest('form').submit();
                
            });
        });
    </script>
@endsection

</x-app-layout>
