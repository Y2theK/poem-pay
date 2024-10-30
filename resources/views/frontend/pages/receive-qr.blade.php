@section('title', 'Receive QR')
<x-app-layout>
    {{-- QR Card --}}
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <p class="text-center font-semibold mb-0">Scan QR to Pay Me</p>
            <div class="flex justify-center">
                {{-- ->merge('/public/image/logo/wallet (7).png')  if you want to embed your loge or sth--}}
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($user->phone)) !!} ">
            </div>
            <p class="text-center font-semibold mb-0">{{ $user->name }}</p>
            <p class="text-center mb-0">{{ $user->phone }}</p>


         
        </div>
    </div>



</x-app-layout>
