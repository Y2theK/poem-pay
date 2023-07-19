@extends('backend.layouts.app')
@section('title', 'User Management')
@section('breadcrumb', 'User Edit')
@section('content')
  <div class="w-full mb-8 overflow-hidden rounded-lg ">
        <div class="w-full overflow-x-auto px-10">
            @include('backend.layouts.flash')
            <form action="{{ route('admin.users.update',$user->id) }}" method="POST" id="user-update-form"> 
            @csrf
            @method('PUT')
            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input type="text" name="name"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe" value="{{ $user->name }}"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input type="text" name="email"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="johndoe@gmail.com" value="{{ $user->email }}"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Phone</span>
                <input type="text" name="phone"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="09123123123" value="{{ $user->phone }}"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input type="password" name="password"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="********" 
                />
            </label>
                
                 <input value="Cancel" type="button"
                  class="back-btn mr-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-purple-600 rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                <input type="submit" value="Save"
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
               
            
            
            </form>
        </div>
  </div>
@endsection

@section('script')



{!! JsValidator::formRequest('App\Http\Requests\backend\UserUpdateRequest', '#user-update-form'); !!}




@endsection