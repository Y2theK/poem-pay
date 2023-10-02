@section('title', 'Creating Elegant Poem')
<x-app-layout>
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form action="{{ route('poems.store') }}" method="POST">
                @csrf
                <div class="mb-4 ">

                    <x-input id="title" class="w-full text-sm" type="text" name="title"
                        placeholder="Start Creating a Majastic Poem" />
                </div>

                <div class=" mb-4  ">
                    <label for="excerpt" class="sr-only">Your excerpt</label>
                    <textarea id="excerpt" rows="4" name="excerpt"
                        class="pt-2 pb-2 pl-3 w-full rounded-lg shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  "
                        placeholder="Write a excerpt..." required></textarea>
                </div>
                <div class=" mb-4  ">
                    <label for="content" class="sr-only">Your full poem</label>
                    <textarea id="content" rows="15" name="content"
                        class="pt-2 pb-2 pl-3 w-full rounded-lg shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  "
                        placeholder="Write a full poem..." required></textarea>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3 submit-btn">
                        {{ __('post') }}
                    </x-button>
                </div>
            </form>

        </div>


    </div>

</x-app-layout>
