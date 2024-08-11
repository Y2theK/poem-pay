<div
    class="fixed bottom-0 border rounded-lg hover:rounded-lg  left-auto z-50 w-full h-16 max-w-lg  bg-white border-t mb-1  border-gray-200 dark:bg-gray-700 dark:border-gray-600">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto font-medium">
        <a type="button" href="{{ route('home') }}"
            class="inline-flex  rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            <svg class="w-4 h-4 mb-1 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            <span
                class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500 " style="font-size: 10px">Home</span>
        </a>
        <a type="button" href="{{ route('wallet') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
           
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mb-1 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">
                <path d="M2.273 5.625A4.483 4.483 0 0 1 5.25 4.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 3H5.25a3 3 0 0 0-2.977 2.625ZM2.273 8.625A4.483 4.483 0 0 1 5.25 7.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 6H5.25a3 3 0 0 0-2.977 2.625ZM5.25 9a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3v-6a3 3 0 0 0-3-3H15a.75.75 0 0 0-.75.75 2.25 2.25 0 0 1-4.5 0A.75.75 0 0 0 9 9H5.25Z" />
            </svg>

            <span
                class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500" style="font-size: 10px">Wallet</span>
        </a>
        <a type="button" href="{{ route('me') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            <svg class="w-4 h-4 mb-1 {{ areActiveRoutes(['me'], 'text-purple-600') }} text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M4,4h6v6H4V4M20,4v6H14V4h6M14,15h2V13H14V11h2v2h2V11h2v2H18v2h2v3H18v2H16V18H13v2H11V16h3V15m2,0v3h2V15H16M4,20V14h6v6H4M6,6V8H8V6H6M16,6V8h2V6H16M6,16v2H8V16H6M4,11H6v2H4V11m5,0h4v4H11V13H9V11m2-5h2v4H11V6M2,2V6H0V2A2,2,0,0,1,2,0H6V2H2M22,0a2,2,0,0,1,2,2V6H22V2H18V0h4M2,18v4H6v2H2a2,2,0,0,1-2-2V18H2m20,4V18h2v4a2,2,0,0,1-2,2H18V22Z" />
            </svg>
         

            <span
                class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['me'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500" style="font-size: 10px">Me</span>
        </a>
        <a type="button" href="{{ route('exchange.index') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
           
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mb-1 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['exchange.index'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">
                <path fill-rule="evenodd" d="M15.97 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H7.5a.75.75 0 0 1 0-1.5h11.69l-3.22-3.22a.75.75 0 0 1 0-1.06Zm-7.94 9a.75.75 0 0 1 0 1.06l-3.22 3.22H16.5a.75.75 0 0 1 0 1.5H4.81l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>

            <span
                class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['exchange.index'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500" style="font-size: 10px"> Exchange</span>
        </a>
        <a type="button" href="{{ route('profile') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mb-1 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
            </svg>

            <span
                class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500" style="font-size: 10px">Profile</span>
        </a>

    </div>
</div>
