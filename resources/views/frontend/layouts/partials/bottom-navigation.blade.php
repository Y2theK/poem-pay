<div
    class="fixed bottom-0 border rounded-lg hover:rounded-lg  left-auto z-50 w-full h-16 max-w-lg  bg-white border-t mb-1  border-gray-200 dark:bg-gray-700 dark:border-gray-600">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto font-medium">
        <a type="button" href="{{ route('home') }}"
            class="inline-flex  rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            {{-- <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">
                <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
            </svg>
            <span
                class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['home'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500">Home</span>
        </a>
        <a type="button" href="{{ route('wallet') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            {{-- <svg class="w-5 h-5 mb-2 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                <path
                    d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-1 text-gray-500  dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">
                <path d="M2.273 5.625A4.483 4.483 0 0 1 5.25 4.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 3H5.25a3 3 0 0 0-2.977 2.625ZM2.273 8.625A4.483 4.483 0 0 1 5.25 7.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0 0 18.75 6H5.25a3 3 0 0 0-2.977 2.625ZM5.25 9a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3v-6a3 3 0 0 0-3-3H15a.75.75 0 0 0-.75.75 2.25 2.25 0 0 1-4.5 0A.75.75 0 0 0 9 9H5.25Z" />
            </svg>

            <span
                class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['wallet'], 'text-purple-600') }} group-hover:text-purple-600  dark:group-hover:text-purple-500">Wallet</span>
        </a>
        <a type="button" href="{{ route('scan_and_pay') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            <svg class="w-5 h-5 mb-1 {{ areActiveRoutes(['scan_and_pay'], 'text-purple-600') }} text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M4,4h6v6H4V4M20,4v6H14V4h6M14,15h2V13H14V11h2v2h2V11h2v2H18v2h2v3H18v2H16V18H13v2H11V16h3V15m2,0v3h2V15H16M4,20V14h6v6H4M6,6V8H8V6H6M16,6V8h2V6H16M6,16v2H8V16H6M4,11H6v2H4V11m5,0h4v4H11V13H9V11m2-5h2v4H11V6M2,2V6H0V2A2,2,0,0,1,2,0H6V2H2M22,0a2,2,0,0,1,2,2V6H22V2H18V0h4M2,18v4H6v2H2a2,2,0,0,1-2-2V18H2m20,4V18h2v4a2,2,0,0,1-2,2H18V22Z" />
            </svg>
            {{-- <svg class="w-5 h-5 mb-1 {{ areActiveRoutes(['scan_and_pay'], 'text-purple-600') }} text-gray-500 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-500" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M23 4C23 2.34315 21.6569 1 20 1H16C15.4477 1 15 1.44772 15 2C15 2.55228 15.4477 3 16 3H20C20.5523 3 21 3.44772 21 4V8C21 8.55228 21.4477 9 22 9C22.5523 9 23 8.55228 23 8V4Z" fill="currentColor"/>
                <path d="M23 16C23 15.4477 22.5523 15 22 15C21.4477 15 21 15.4477 21 16V20C21 20.5523 20.5523 21 20 21H16C15.4477 21 15 21.4477 15 22C15 22.5523 15.4477 23 16 23H20C21.6569 23 23 21.6569 23 20V16Z" fill="currentColor"/>
                <path d="M4 21C3.44772 21 3 20.5523 3 20V16C3 15.4477 2.55228 15 2 15C1.44772 15 1 15.4477 1 16V20C1 21.6569 2.34315 23 4 23H8C8.55228 23 9 22.5523 9 22C9 21.4477 8.55228 21 8 21H4Z" fill="currentColor"/>
                <path d="M1 8C1 8.55228 1.44772 9 2 9C2.55228 9 3 8.55228 3 8V4C3 3.44772 3.44772 3 4 3H8C8.55228 3 9 2.55228 9 2C9 1.44772 8.55228 1 8 1H4C2.34315 1 1 2.34315 1 4V8Z" fill="currentColor"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 6C11 5.44772 10.5523 5 10 5H6C5.44772 5 5 5.44772 5 6V10C5 10.5523 5.44772 11 6 11H10C10.5523 11 11 10.5523 11 10V6ZM9 7.5C9 7.22386 8.77614 7 8.5 7H7.5C7.22386 7 7 7.22386 7 7.5V8.5C7 8.77614 7.22386 9 7.5 9H8.5C8.77614 9 9 8.77614 9 8.5V7.5Z" fill="currentColor"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 13C18.5523 13 19 13.4477 19 14V18C19 18.5523 18.5523 19 18 19H14C13.4477 19 13 18.5523 13 18V14C13 13.4477 13.4477 13 14 13H18ZM15 15.5C15 15.2239 15.2239 15 15.5 15H16.5C16.7761 15 17 15.2239 17 15.5V16.5C17 16.7761 16.7761 17 16.5 17H15.5C15.2239 17 15 16.7761 15 16.5V15.5Z" fill="currentColor"/>
                <path d="M14 5C13.4477 5 13 5.44772 13 6C13 6.55229 13.4477 7 14 7H16.5C16.7761 7 17 7.22386 17 7.5V10C17 10.5523 17.4477 11 18 11C18.5523 11 19 10.5523 19 10V6C19 5.44772 18.5523 5 18 5H14Z" fill="currentColor"/>
                <path d="M14 8C13.4477 8 13 8.44771 13 9V10C13 10.5523 13.4477 11 14 11C14.5523 11 15 10.5523 15 10V9C15 8.44772 14.5523 8 14 8Z" fill="currentColor"/>
                <path d="M6 13C5.44772 13 5 13.4477 5 14V16C5 16.5523 5.44772 17 6 17C6.55229 17 7 16.5523 7 16V15.5C7 15.2239 7.22386 15 7.5 15H10C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13H6Z" fill="currentColor"/>
                <path d="M10 17C9.44771 17 9 17.4477 9 18C9 18.5523 9.44771 19 10 19C10.5523 19 11 18.5523 11 18C11 17.4477 10.5523 17 10 17Z" fill="currentColor"/>
            </svg> --}}

            <span
                class=" text-gray-500 dark:text-gray-400  {{ areActiveRoutes(['scan_and_pay'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">Scan</span>
        </a>
        <a type="button" href="{{ route('transactions') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            {{-- <svg class="w-6 h-6 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['transactions', 'transactions.detail'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 10H20L16 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M16 14L4 14L8 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['transactions', 'transactions.detail'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">
                <path fill-rule="evenodd" d="M15.97 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H7.5a.75.75 0 0 1 0-1.5h11.69l-3.22-3.22a.75.75 0 0 1 0-1.06Zm-7.94 9a.75.75 0 0 1 0 1.06l-3.22 3.22H16.5a.75.75 0 0 1 0 1.5H4.81l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>

            <span
                class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['transactions', 'transactions.detail'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">Transactions</span>
        </a>
        <a type="button" href="{{ route('profile') }}"
            class="inline-flex rounded-lg flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            {{-- <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
            </svg>

            <span
                class=" text-gray-500 dark:text-gray-400 {{ areActiveRoutes(['profile'], 'text-purple-600') }} group-hover:text-purple-600 dark:group-hover:text-purple-500">Profile</span>
        </a>

    </div>
</div>
