@section('title', 'Full Poem')
<x-app-layout>


    <!-- Content grid -->
    <div class="flex justify-center">
        <div
            class="w-full py-5 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

           



                {{-- @foreach ($poems as $poem) --}}
                <!-- Card-->
                <article
                    class="mb-4 break-inside p-6 rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
                    <div class="flex pb-6 items-center justify-between">
                        <div class="flex">
                            <a class="inline-block mr-4" href="#">
                                <img class="rounded-full max-w-none w-14 h-14  shadow-lg {{ $poem->user->avatar ? '' : 'border-2 border-purple-600' }}"
                                    src="{{ $poem->user->avatar }}" />
                            </a>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <a class="inline-block text-lg font-bold mr-2"
                                        href="#">{{ $poem->user->name }}</a>
                                    <span
                                        class="text-slate-500 dark:text-slate-300">{{ $poem->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="text-slate-500 dark:text-slate-300">
                                    {{ $poem->user->email }}
                                </div>
                                <div>
                                </div>
                            </div>

                        </div>
                        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                @can('update',$poem)

                                <li>
                                    <a href="{{ route('poems.edit', $poem) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Edit') }}</a>
                                </li>
                                @endcan
                                @can('delete',$poem)

                                <li>
                                    <a href="{{ route('poems.destroy', $poem) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Delete') }}</a>
                                </li>
                                @endcan
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Saved') }}</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <a href="{{ route('poems.show', $poem) }}">
                        <h2 class="text-3xl font-extrabold">
                            {{ $poem->title }}
                        </h2>
                        <div class="py-4">
                            <p>
                                {!! $poem->content !!}
                            </p>
                        </div>
                    </a>
                    <div class="py-4">
                        <a class="inline-flex items-center" href="#">
                            <span class="mr-2">
                                <svg class="fill-rose-600 dark:fill-rose-400" style="width: 24px; height: 24px;"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                                    </path>
                                </svg>
                            </span>
                            <span class="text-lg font-bold"> {{ $poem->reactions->count() }}</span>
                        </a>
                    </div>
                    <div class="relative">
                        <input
                            class="pt-2 pb-2 pl-3 w-full h-11 bg-slate-100 dark:bg-slate-600 rounded-lg placeholder:text-slate-600 dark:placeholder:text-slate-300 font-medium pr-20"
                            type="text" placeholder="Write a comment" />
                        <span class="flex absolute right-3 top-2/4 -mt-3 items-center">
                            <svg class="mr-2" style="width: 26px; height: 26px;" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z">
                                </path>
                            </svg>
                            <svg class="fill-purple-500 dark:fill-slate-50" style="width: 24px; height: 24px;"
                                viewBox="0 0 24 24">
                                <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
                            </svg>
                        </span>
                    </div>
                    <!-- Comments content -->
                    <div class="pt-6">
                        @foreach ($poem->comments as $comment)
                            <!-- Comment row -->
                            <div class="media flex pb-4">
                                <a class="mr-4" href="#">
                                  
                                    <img class="rounded-full max-w-none w-11 h-11  shadow-lg {{ $comment->user->avatar ? '' : 'border-2 border-purple-600' }}"
                                        src="{{ $comment->user->avatar  }}" />
                                </a>
                                <div class="media-body">
                                    <div>
                                        <a class="inline-block text-base font-bold mr-2"
                                            href="#">{{ $comment->user->name }}</a>
                                        <span
                                            class="text-slate-500 dark:text-slate-300">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p>
                                        {{ $comment->content }}
                                    </p>
                                    <div class="mt-2 flex items-center">
                                        <a class="inline-flex items-center py-2 mr-3" href="#">
                                            <span class="mr-2">
                                                <svg class="fill-rose-600 dark:fill-rose-400"
                                                    style="width: 22px; height: 22px;" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="text-base font-bold">2</span>
                                        </a>
                                        <button
                                            class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                                            Reply
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- End comments row -->
                        @endforeach

                        <!-- More comments -->
                        @if ($poem->comments->count() > 2)
                            <div class="w-full">
                                <a href="#"
                                    class="py-3 px-4 w-full block bg-slate-100 dark:bg-slate-700 text-center rounded-lg font-medium hover:bg-slate-200 dark:hover:bg-slate-600 transition ease-in-out delay-75">Show
                                    more comments</a>
                            </div>
                        @endif

                        <!-- End More comments -->
                    </div>
                    <!-- End Comments content -->
                </article>
                <!-- Close card -->
                {{-- @endforeach --}}

           
        </div>
    </div>



</x-app-layout>
