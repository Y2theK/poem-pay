@extends('backend.layouts.app')
@section('title', 'Setting Management')
@section('breadcrumb', 'Setting Edit')
@section('content')
  <div class="w-full mb-8 overflow-hidden rounded-lg ">
        <div class="w-full overflow-x-auto px-10">
            @include('backend.layouts.flash')
            <form action="{{ route('admin.setting.update',$setting->id) }}" method="POST" id="setting-update-form"> 
            @csrf
            @method('PUT')
            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Register Pay Amount</span>
                <input type="number" name="register_pay_amount"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="10" value="{{ $setting->register_pay_amount }}"
                />
            </label>

            <input value="Cancel" type="button"
            class="mr-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-purple-600 rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
            <input type="submit" value="Save"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
               
            
            
            </form>
        </div>
  </div>
@endsection

@section('script')



{!! JsValidator::formRequest('App\Http\Requests\backend\SettingRequest', '#setting-update-form'); !!}




@endsection