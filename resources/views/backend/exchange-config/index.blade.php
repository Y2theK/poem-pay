@extends('backend.layouts.app')
@section('title', 'Exchange Config Management')
@section('breadcrumb', 'Exchange Config Edit')
@section('content')
  <div class="w-full mb-8 overflow-hidden rounded-lg ">
        <div class="w-full overflow-x-auto px-10">
            @include('backend.layouts.flash')
            <form action="{{ route('admin.exchange_config.update',$config->id) }}" method="POST" id="config-update-form"> 
            @csrf
            @method('PUT')
            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Reaction Rate</span>
                <input type="number" name="reaction_rate"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="10" value="{{ $config->reaction_rate }}"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Comment Rate</span>
                <input type="number" name="comment_rate"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="30" value="{{ $config->comment_rate }}"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Share Rate</span>
                <input type="number" name="share_rate"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="50" value="{{ $config->share_rate }}"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Time</span>
                <input type="number" name="time"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="50" value="{{ $config->time }}"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Time Type</span>
                <select name="time_type"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    <option value="day"   @if($config->time_type == 'day') selected @endif> Day</option>
                    <option value="month" @if($config->time_type == 'month') selected @endif > Month</option>
                    <option value="week"  @if($config->time_type == 'week') selected @endif> Week</option>
                    <option value="year"  @if($config->time_type == 'year') selected @endif>Year</option>
                </select>
              
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



{!! JsValidator::formRequest('App\Http\Requests\backend\ExchangeConfigRequest', '#config-update-form'); !!}




@endsection