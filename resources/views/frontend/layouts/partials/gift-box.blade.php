<div class="min-h-screen py-6 flex flex-col justify-center sm:py-12 fixed z-50 inset-0 overflow-y-auto h-full w-full px-4"
x-data="{ open: false }"  x-init="() => setTimeout(() => open = true, 500)" x-show="open"     
        x-transition:enter-start="opacity-0 scale-90" 
        x-transition:enter="transition duration-200 transform ease"
        x-transition:leave="transition duration-200 transform ease"
        x-transition:leave-end="opacity-0 scale-90">
  <div class="py-3 sm:max-w-xl sm:mx-auto">
 <div  class="bg-white min-w-1xl flex flex-col shadow-lg" style="background-color:#36393f;">
      <div class="px-16 py-7">
          <img class="h-24 m-auto rounded-full mb-2" src="{{ asset('image/logo/logo_wallet.png') }}">
        <p class="text-gray-300 text-center">{{ config('app.name') }} sent a gift</p>
        <div class="flex m-auto">
        <img src="{{ asset('image/logo/logo_wallet.png') }}" class="h-10 mr-2">
        <h2 class="text-gray-100 text-3xl font-semibold text-center">50 Free Amount of Point</h2>
        </div><br>
        <p @click="open = false" class="cursor-pointer text-white text-center w-full m-auto shadow-md py-2 px-2 rounded-sm bg-purple-500" style="bg-purple-500">Woo, Accept gift!</p>
      </a>
      </div>
    </div>
  </div>
</div>
