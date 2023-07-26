@section('title', 'Profile')
<x-app-layout>
    {{-- Profile Card --}}
    <div class="flex justify-center">
        <div
            class="w-full py-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center py-4">
                <img class="w-15 h-15 border-2 border-blue-600 mb-5 rounded-full shadow-lg"
                    src="https://ui-avatars.com/api/?name={{ $user->name }}&background=ffffff" alt="{{ $user->name }}" />
                
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
            <a class="flex cursor-pointer my-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                <span>Update Password</span> <span><i class="las la-angle-right"></i></span>
            </a>
            <hr>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            this.closest('form').submit();" class="flex cursor-pointer my-4 px-5 justify-between text-md font-medium text-gray-900 dark:text-white">
                <span>Logout</span> <span><i class="las la-angle-right"></i></span>
            </a>
            </form>
        </div>
    </div>
    
</x-app-layout>
