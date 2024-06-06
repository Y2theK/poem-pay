@extends('backend.layouts.app')
@section('title', 'Post Management')
@section('breadcrumb', 'Post Create')
@section('content')
  <div class="w-full mb-8 overflow-hidden rounded-lg">
      @include('backend.layouts.flash')
        <div class="w-full overflow-x-auto px-10">
            <form action="{{ route('admin.posts.store') }}" method="POST" id="post-create-form"> 
            @csrf
            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Title</span>
                <input type="text" name="title"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Leisure"
                />
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Excerpt</span>
                <textarea id="excerpt" rows="3" name="excerpt"  style="resize: none"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="What is this life, if full of care"></textarea>
               
            </label>

            <label class="block text-sm mb-4">
                <span class="text-gray-700 dark:text-gray-400">Content</span>
                <textarea id="summernote"  rows="60" name="content"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="What is this life, if full of care"></textarea>
            </label>

           
            <input value="Cancel" type="button"
            class="back-btn mr-3 px-4 py-2 text-sm font-medium leading-5 text-gray-700 dark:text-white transition-colors duration-150 bg-transparent border border-purple-600 rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
            <input type="submit" value="Save"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
               
            
            
            </form>
        </div>
  </div>
@endsection

@section('script')

{!! JsValidator::formRequest('App\Http\Requests\backend\PostRequest', '#post-create-form'); !!}

@endsection