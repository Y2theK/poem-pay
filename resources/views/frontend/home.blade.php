@section('title', 'Magic Pay')
<x-app-layout>
   <!-- Example -->
<div class="text-black dark:text-slate-100 bg-slate-200 dark:bg-slate-900 flex justify-center">
    <!-- Wrapper-->
    <div class="wrapper pt-10  max-w-5xl">
  
      <!-- Content grid -->
      <div class="box-border max-w-7xl mx-4 sm:columns-1 md:columns-2 lg:columns-3 xl:columns-3">
      
    @foreach ($poems as $poem)
        <!-- Card-->
        <article class="mb-4 break-inside p-6 rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
            <div class="flex pb-6 items-center justify-between">
              <div class="flex">
                <a class="inline-block mr-4" href="#">
                  <img class="rounded-full max-w-none w-14 h-14" src="https://randomuser.me/api/portraits/men/9.jpg" />
                </a>
                <div class="flex flex-col">
                  <div class="flex items-center">
                    <a class="inline-block text-lg font-bold mr-2" href="#">{{ $poem->user->name }}</a>
                    <span class="text-slate-500 dark:text-slate-300">{{ $poem->created_at->diffForHumans() }}</span>
                  </div>
                  <div class="text-slate-500 dark:text-slate-300">
                    {{ $poem->user->email }}
                  </div>
                </div>
              </div>
            </div>
            <h2 class="text-3xl font-extrabold">
             {{ $poem->title }}
            </h2>
            <div class="py-4">
              <p>
                {!! $poem->content !!}
              </p>
            </div>
            <div class="py-4">
              <a class="inline-flex items-center" href="#">
                <span class="mr-2">
                  <svg class="fill-rose-600 dark:fill-rose-400" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                    <path
                      d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                    </path>
                  </svg>
                </span>
                <span class="text-lg font-bold"> {{ $poem->reactions()->count() }}</span>
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
                <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
                </svg>
              </span>
            </div>
            <!-- Comments content -->
            <div class="pt-6">
              <!-- Comment row -->
              <div class="media flex pb-4">
                <a class="mr-4" href="#">
                  <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/men/54.jpg" />
                </a>
                <div class="media-body">
                  <div>
                    <a class="inline-block text-base font-bold mr-2" href="#">Shawn</a>
                    <span class="text-slate-500 dark:text-slate-300">2 days ago</span>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do
                    eiusmod.
                  </p>
                  <div class="mt-2 flex items-center">
                    <a class="inline-flex items-center py-2 mr-3" href="#">
                      <span class="mr-2">
                        <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                          viewBox="0 0 24 24">
                          <path
                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                          </path>
                        </svg>
                      </span>
                      <span class="text-base font-bold">2</span>
                    </a>
                    <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                      Repply
                    </button>
                  </div>
                </div>
              </div>
              <!-- End comments row -->
              <!-- comments row -->
              <div class="media flex pb-4">
                <a class="inline-block mr-4" href="#">
                  <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/women/54.jpg" />
                </a>
                <div class="media-body">
                  <div>
                    <a class="inline-block text-base font-bold mr-2" href="#">Dianne Russell</a>
                    <span class="text-slate-500 dark:text-slate-300">3 minutes ago</span>
                  </div>
                  <p>
                    Dolor sit ameteiusmod Dolor sit ameteiusmod
                    😍😍✌🤪consectetur adipiscing elitconsectetur adipiscing
                    elit.
                  </p>
                  <div class="mt-2 flex items-center">
                    <a class="inline-flex items-center py-2 mr-3" href="#">
                      <span class="mr-2">
                        <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                          viewBox="0 0 24 24">
                          <path
                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                          </path>
                        </svg>
                      </span>
                      <span class="text-base font-bold">2</span>
                    </a>
                    <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                      Repply
                    </button>
                  </div>
                </div>
              </div>
              <!-- End comments row -->
              <!-- More comments -->
              <div class="w-full">
                <a href="#"
                  class="py-3 px-4 w-full block bg-slate-100 dark:bg-slate-700 text-center rounded-lg font-medium hover:bg-slate-200 dark:hover:bg-slate-600 transition ease-in-out delay-75">Show
                  more comments</a>
              </div>
              <!-- End More comments -->
            </div>
            <!-- End Comments content -->
          </article>
          <!-- Close card -->
    @endforeach
        <!-- Card-->
        <article class="mb-4 break-inside p-6 rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
          <div class="flex pb-6 items-center justify-between">
            <div class="flex">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-14 h-14" src="https://randomuser.me/api/portraits/men/9.jpg" />
              </a>
              <div class="flex flex-col">
                <div class="flex items-center">
                  <a class="inline-block text-lg font-bold mr-2" href="#">Eduardo</a>
                  <span class="text-slate-500 dark:text-slate-300">25 minutes ago</span>
                </div>
                <div class="text-slate-500 dark:text-slate-300">
                  General Electric
                </div>
              </div>
            </div>
          </div>
          <h2 class="text-3xl font-extrabold">
            Web Design templates Selection
          </h2>
          <div class="py-4">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
          <div class="py-4">
            <a class="inline-flex items-center" href="#">
              <span class="mr-2">
                <svg class="fill-rose-600 dark:fill-rose-400" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path
                    d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                  </path>
                </svg>
              </span>
              <span class="text-lg font-bold">34</span>
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
              <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
              </svg>
            </span>
          </div>
          <!-- Comments content -->
          <div class="pt-6">
            <!-- Comment row -->
            <div class="media flex pb-4">
              <a class="mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/men/54.jpg" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">Shawn</a>
                  <span class="text-slate-500 dark:text-slate-300">2 days ago</span>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do
                  eiusmod.
                </p>
                <div class="mt-2 flex items-center">
                  <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                      <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                          d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                      </svg>
                    </span>
                    <span class="text-base font-bold">2</span>
                  </a>
                  <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    Repply
                  </button>
                </div>
              </div>
            </div>
            <!-- End comments row -->
            <!-- comments row -->
            <div class="media flex pb-4">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/women/54.jpg" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">Dianne Russell</a>
                  <span class="text-slate-500 dark:text-slate-300">3 minutes ago</span>
                </div>
                <p>
                  Dolor sit ameteiusmod Dolor sit ameteiusmod
                  😍😍✌🤪consectetur adipiscing elitconsectetur adipiscing
                  elit.
                </p>
                <div class="mt-2 flex items-center">
                  <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                      <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                          d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                      </svg>
                    </span>
                    <span class="text-base font-bold">2</span>
                  </a>
                  <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    Repply
                  </button>
                </div>
              </div>
            </div>
            <!-- End comments row -->
            <!-- More comments -->
            <div class="w-full">
              <a href="#"
                class="py-3 px-4 w-full block bg-slate-100 dark:bg-slate-700 text-center rounded-lg font-medium hover:bg-slate-200 dark:hover:bg-slate-600 transition ease-in-out delay-75">Show
                more comments</a>
            </div>
            <!-- End More comments -->
          </div>
          <!-- End Comments content -->
        </article>
        <!-- Close card -->
  
        <!-- Card-->
        <article class="mb-4 break-inside p-6 rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
          <div class="flex pb-6 items-center justify-between">
            <div class="flex">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-14 h-14" src="https://randomuser.me/api/portraits/women/43.jpg" />
              </a>
              <div class="flex flex-col">
                <div class="flex items-center">
                  <a class="inline-block text-lg font-bold mr-2" href="#">Anna Bernal</a>
                  <span class="text-slate-500 dark:text-slate-300">Johnson & Johnson</span>
                </div>
                <div class="text-slate-500 dark:text-slate-300">
                  General Electric
                </div>
              </div>
            </div>
          </div>
          <div class="my-4 flex gap-1">
            <div class="flex flex-col gap-1 flex-1">
              <a class="flex h-2/4" href="#">
                <img class="w-full h-full rounded-tl-lg object-cover"
                  src="https://images.pexels.com/photos/327331/pexels-photo-327331.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" />
              </a>
              <a class="flex h-2/4" href="#">
                <img class="w-full rounded-bl-lg object-cover"
                  src="https://images.pexels.com/photos/92866/pexels-photo-92866.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" />
              </a>
            </div>
            <div class="flex flex-col gap-1 flex-1">
              <a class="flex h-full" href="#">
                <img class="w-full rounded-tr-lg rounded-br-lg object-cover"
                  src="https://images.pexels.com/photos/247931/pexels-photo-247931.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" />
              </a>
            </div>
          </div>
          <h2 class="text-3xl font-extrabold">
            Web Design templates Selection
          </h2>
          <div class="py-4">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
          <div class="py-4">
            <a class="inline-flex items-center" href="#">
              <span class="mr-2">
                <svg class="fill-rose-600 dark:fill-rose-400" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path
                    d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                  </path>
                </svg>
              </span>
              <span class="text-lg font-bold">34</span>
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
              <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
              </svg>
            </span>
          </div>
          <!-- Comments content -->
          <div class="pt-6">
            <!-- Comment row -->
            <div class="media flex pb-4">
              <a class="mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/women/23.jpg" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">Jerome Bell</a>
                  <span class="text-slate-500 dark:text-slate-300">2 days ago</span>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do
                  eiusmod.
                </p>
                <div class="mt-2 flex items-center">
                  <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                      <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                          d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                      </svg>
                    </span>
                    <span class="text-base font-bold">2</span>
                  </a>
                  <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    Repply
                  </button>
                </div>
              </div>
            </div>
            <!-- End comments row -->
            <!-- comments row -->
            <div class="media flex pb-4">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/women/59.jpg" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">Eleanor Pena</a>
                  <span class="text-slate-500 dark:text-slate-300">3 minutes ago</span>
                </div>
                <p>
                  Dolor sit ameteiusmod Dolor sit ameteiusmod
                  😍😍✌🤪consectetur adipiscing elitconsectetur adipiscing
                  elit.
                </p>
                <div class="mt-2 flex items-center">
                  <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                      <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                          d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                      </svg>
                    </span>
                    <span class="text-base font-bold">2</span>
                  </a>
                  <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    Repply
                  </button>
                </div>
                <!-- Repply content -->
                <div class="mt-4">
                  <!-- Comment row -->
                  <div class="media flex pb-4">
                    <a class="mr-4" href="#">
                      <img class="rounded-full max-w-none w-10 h-10"
                        src="https://randomuser.me/api/portraits/men/23.jpg" />
                    </a>
                    <div class="media-body">
                      <div>
                        <a class="inline-block text-base font-bold mr-2" href="#">Joseph Diaz</a>
                        <span class="text-slate-500 dark:text-slate-300">5 minutes ago</span>
                      </div>
                      <p>Dolor sit ameteiusmod consectetur.</p>
                      <div class="mt-2 flex items-center">
                        <a class="inline-flex items-center py-2 mr-3" href="#">
                          <span class="mr-2">
                            <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                              viewBox="0 0 24 24">
                              <path
                                d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                              </path>
                            </svg>
                          </span>
                          <span class="text-base font-bold">8</span>
                        </a>
                        <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                          Repply
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- End comments row -->
                </div>
                <!-- End repply content -->
              </div>
            </div>
            <!-- End comments row -->
            <!-- More comments -->
            <div class="w-full">
              <a href="#"
                class="py-3 px-4 w-full block bg-slate-100 dark:bg-slate-700 text-center rounded-lg font-medium hover:bg-slate-200 dark:hover:bg-slate-600 transition ease-in-out delay-75">Show
                more comments</a>
            </div>
            <!-- End More comments -->
          </div>
          <!-- End Comments content -->
        </article>
        <!-- Close card -->
  
        <!-- Card-->
        <article class="mb-4 break-inside p-6 rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
          <div class="flex pb-6 items-center justify-between">
            <div class="flex">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-14 h-14" src="https://randomuser.me/api/portraits/men/32.jpg" />
              </a>
              <div class="flex flex-col">
                <div class="flex items-center">
                  <a class="inline-block text-lg font-bold mr-2" href="#">Savannah Nguyen</a>
                </div>
                <div class="text-slate-500 dark:text-slate-300">
                  January 22, 2021
                </div>
              </div>
            </div>
          </div>
          <h2 class="text-3xl font-extrabold">
            Web Design templates Selection
          </h2>
          <div class="py-4">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
          <div class="py-4">
            <a class="inline-flex items-center" href="#">
              <span class="mr-2">
                <svg class="fill-rose-600 dark:fill-rose-400" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path
                    d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                  </path>
                </svg>
              </span>
              <span class="text-lg font-bold">15</span>
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
              <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
              </svg>
            </span>
          </div>
        </article>
        <!-- End Card -->
  
        <!-- Card-->
        <article class="mb-4 break-inside rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
          <div class="flex p-6 items-center justify-between">
            <div class="flex">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-14 h-14" src="https://randomuser.me/api/portraits/women/47.jpg" />
              </a>
              <div class="flex flex-col">
                <div class="flex items-center">
                  <a class="inline-block text-lg font-bold mr-2" href="#">Annette Black</a>
                  <span class="text-slate-500 dark:text-slate-300">3 minutes ago</span>
                </div>
                <div class="text-slate-500 dark:text-slate-300">
                  Medical Assistant
                </div>
              </div>
            </div>
          </div>
          <div class="p-6 bg-violet-500">
            <h2 class="text-3xl font-extrabold text-white">
              Web Design templates Selection
            </h2>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-center">
              <a class="inline-flex items-center" href="#">
                <span class="-m-1 rounded-full border-2 border-white dark:border-slate-800">
                  <img class="w-6" src="https://cdn.iconscout.com/icon/free/png-256/like-2387659-1991059.png" />
                </span>
                <span class="-m-1 rounded-full border-2 border-white dark:border-slate-800">
                  <img class="w-6" src="https://cdn.iconscout.com/icon/free/png-256/love-2387666-1991064.png" />
                </span>
                <span class="-m-1 rounded-full border-2 border-white dark:border-slate-800">
                  <img class="w-6" src="https://cdn.iconscout.com/icon/free/png-256/haha-2387660-1991060.png" />
                </span>
                <span class="text-lg font-bold ml-3">237</span>
              </a>
              <a class="ml-auto" href="#">23 comentarios</a>
            </div>
            <div class="mt-6 mb-6 h-px bg-slate-200"></div>
            <div class="flex items-center justify-between mb-6">
              <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                Me gusta
              </button>
              <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                Comentar
              </button>
              <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                Compartir
              </button>
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
                <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
                </svg>
              </span>
            </div>
          </div>
        </article>
        <!-- End Card -->
  
        <!-- Card-->
        <article class="mb-4 break-inside rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
          <div class="flex p-6 items-center justify-between">
            <div class="flex">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-14 h-14" src="https://randomuser.me/api/portraits/women/33.jpg" />
              </a>
              <div class="flex flex-col">
                <div class="flex items-center">
                  <a class="inline-block text-lg font-bold mr-2" href="#">Cameron Williamson</a>
                  <span>
                    <svg class="fill-blue-500 dark:fill-slate-50 w-5 h-5" viewBox="0 0 24 24">
                      <path
                        d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z">
                      </path>
                    </svg>
                  </span>
                </div>
                <div class="text-slate-500 dark:text-slate-300">
                  Software Development Manager
                </div>
              </div>
            </div>
          </div>
          <p class="pr-6 pl-6 pb-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="p-6 bg-gradient-to-r from-cyan-500 to-blue-500">
            <h2 class="text-3xl text-white font-extrabold">
              Lorem ipsum dolor sit amet consectetur adipiscing elit sed do
              eiusmod.
            </h2>
          </div>
          <div class="p-6">
            <a class="inline-flex items-center" href="#">
              <span class="mr-2">
                <svg class="fill-rose-600 dark:fill-rose-400" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path
                    d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                  </path>
                </svg>
              </span>
              <span class="text-lg font-bold">68</span>
            </a>
          </div>
          <div class="px-6">
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
                <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
                </svg>
              </span>
            </div>
          </div>
          <!-- Comments content -->
          <div class="p-6">
            <!-- Comment row -->
            <div class="media flex pb-4">
              <a class="mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/women/83.jpg" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">Kristin Watson</a>
                  <span class="text-slate-500 dark:text-slate-300">25 minutes ago</span>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit seddo
                </p>
                <div class="mt-2 flex items-center">
                  <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                      <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                          d="M12.1 18.55L12 18.65L11.89 18.55C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5C9.04 5 10.54 6 11.07 7.36H12.93C13.46 6 14.96 5 16.5 5C18.5 5 20 6.5 20 8.5C20 11.39 16.86 14.24 12.1 18.55M16.5 3C14.76 3 13.09 3.81 12 5.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5C2 12.27 5.4 15.36 10.55 20.03L12 21.35L13.45 20.03C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3Z">
                        </path>
                      </svg>
                    </span>
                    <span class="text-base font-bold">0</span>
                  </a>
                  <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    Repply
                  </button>
                </div>
              </div>
            </div>
            <!-- End comments row -->
            <!-- comments row -->
            <div class="media flex pb-4">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/women/74.jpg" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">Melvin D. Goodman</a>
                  <span class="text-slate-500 dark:text-slate-300">3 minutes ago</span>
                </div>
                <p>Dolor sit ameteiusmod consectetur adipiscing elit.</p>
                <div class="mt-2 flex items-center">
                  <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                      <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                          d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                      </svg>
                    </span>
                    <span class="text-base font-bold">23</span>
                  </a>
                  <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    Repply
                  </button>
                </div>
              </div>
            </div>
            <!-- End comments row -->
            <!-- comments row -->
            <div class="media flex pb-4">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/men/7.jpg" />
              </a>
              <div class="media-body">
                <div>
                  <a class="inline-block text-base font-bold mr-2" href="#">Erik Moore</a>
                  <span class="text-slate-500 dark:text-slate-300">3 minutes ago</span>
                </div>
                <p>Dolor sit ameteiusmod consectetur adipiscing elit.</p>
                <div class="py-4">
                  <a class="flex" href="#">
                    <img class="max-w-full rounded-lg"
                      src="https://images.pexels.com/photos/61381/pexels-photo-61381.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" />
                  </a>
                </div>
                <div class="mt-2 flex items-center">
                  <a class="inline-flex items-center py-2 mr-3" href="#">
                    <span class="mr-2">
                      <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                        viewBox="0 0 24 24">
                        <path
                          d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                      </svg>
                    </span>
                    <span class="text-base font-bold">23</span>
                  </a>
                  <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                    Repply
                  </button>
                </div>
              </div>
            </div>
            <!-- End comments row -->
            <!-- More comments -->
            <div class="w-full">
              <a href="#"
                class="py-3 px-4 w-full block bg-slate-100 dark:bg-slate-700 text-center rounded-lg font-medium hover:bg-slate-200 dark:hover:bg-slate-600 transition ease-in-out delay-75">Show
                more comments</a>
            </div>
            <!-- End More comments -->
          </div>
          <!-- End Comments content -->
        </article>
        <!-- Close Card -->
  
        <!-- Card-->
        <article class="mb-4 break-inside rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
          <div class="flex p-6 items-center justify-between">
            <div class="flex">
              <a class="inline-block mr-4" href="#">
                <img class="rounded-full max-w-none w-14 h-14" src="https://randomuser.me/api/portraits/women/67.jpg" />
              </a>
              <div class="flex flex-col">
                <div class="flex items-center">
                  <a class="inline-block text-lg font-bold mr-2" href="#">Marylin B. Bechtol</a>
                  <span class="text-slate-500 dark:text-slate-300">3 minutes ago</span>
                </div>
                <div class="text-slate-500 dark:text-slate-300">
                  Marketing Coordinator
                </div>
              </div>
            </div>
          </div>
          <p class="pr-6 pl-6 pb-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmodelit sed do eiusmodelit sed do eiusmodelit sed do eiusmod
            <a href="#" class="font-medium text-blue-700 dark:text-blue-500">#ui</a>
            <a href="#" class="font-medium text-blue-700 dark:text-blue-500">#uxui</a>
            <a href="#" class="font-medium text-blue-700 dark:text-blue-500">#userinterface</a>
            <a href="#" class="font-medium text-blue-700 dark:text-blue-500">#webdeveloper</a>
            <a href="#" class="font-medium text-blue-700 dark:text-blue-500">#card</a>
          </p>
          <div class="p-6 bg-yellow-500">
            <h2 class="text-3xl font-extrabold text-black">
              Web Design templates Selection
            </h2>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-center">
              <a class="inline-flex items-center" href="#">
                <span class="-m-1 rounded-full border-2 border-white dark:border-slate-800">
                  <img class="w-6" src="https://cdn.iconscout.com/icon/free/png-256/like-2387659-1991059.png" />
                </span>
                <span class="-m-1 rounded-full border-2 border-white dark:border-slate-800">
                  <img class="w-6" src="https://cdn.iconscout.com/icon/free/png-256/angry-2387661-1991061.png" />
                </span>
                <span class="-m-1 rounded-full border-2 border-white dark:border-slate-800">
                  <img class="w-6" src="https://cdn.iconscout.com/icon/free/png-256/wow-2387663-1991062.png" />
                </span>
                <span class="text-lg font-bold ml-3">237</span>
              </a>
              <a class="ml-auto" href="#">23 comentarios</a>
            </div>
            <div class="mt-6 mb-6 h-px bg-slate-200"></div>
            <div class="flex items-center justify-between mb-6">
              <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                Me gusta
              </button>
              <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                Comentar
              </button>
              <button class="py-2 px-4 font-medium hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg">
                Compartir
              </button>
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
                <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                  <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
                </svg>
              </span>
            </div>
          </div>
        </article>
        <!-- End Card -->
      </div>
    </div>
    <!-- End Wrapper-->
</div>
  
   

</x-app-layout>
