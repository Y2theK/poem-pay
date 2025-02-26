@section('title', 'Scan & Pay')
<x-app-layout>
    {{-- Profile Card --}}
    
    <div class="flex justify-center">

        <div
            class="w-full py-5 px-10 max-w-5xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @include('backend.layouts.flash')
            <div class="flex justify-center">


                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"
                    data-imageid="bug-fixing-4" imageName="QR code" class="illustrations_image" width="406"
                    height="306">
                    <title>_</title>
                    <path
                        d="M303.91,63.94c33.15,9.24,58.74,35.63,65.19,68.79,5.44,27.93-4.15,62.39-58.85,78.69-55.83,16.65-211.69,25.46-240.34-19.73S47.77,88.26,107.32,67.27C149.06,52.55,239.15,45.89,303.91,63.94Z"
                        fill="#e6e6e6" opacity="0.3" />
                    <rect x="141.29" y="38.98" width="182.44" height="200.34" fill="#e6e6e6" />
                    <g opacity="0.1">
                        <path d="M279.68,151h0Z" />
                        <path d="M240.83,117.72h0Z" />
                        <path
                            d="M279.68,178.76v-5.53h-5.51V162.1h5.51V151h-5.55v-11.1h-5.51v-5.56h5.51V128.8h-5.56v-5.54H240.83v-5.53h-5.56V106.65h-5.53v11h-5.55V101.08h-5.56v44.41H202V151h16.63v5.56h5.54c0,1.84,0,3.69,0,5.53h5.51v5.57H224.2v11.08h11.11v-5.52H263v5.55H252v5.54h5.54v5.53h11.11v5.53h5.54V184.3h16.61v-5.54Zm-22.17-49.91H263v5.49h-5.49Zm-11.14,38.79h-5.49v-5.49h5.49Zm0-22.16v11.06h-5.55V151h-5.54v5.52H224.2V151h5.52v-5.54h-5.5v-11.1h11.05v-5.54h16.65V139.9H263v5.56H246.4Zm11.08,16.63H252V156.6h5.51Zm11.07,5.53H257.5v-5.51h11.05Zm0-16.65H263v-5.51h5.51Z" />
                        <path d="M257.5,189.87h0Z" />
                        <path d="M246.39,145.48h0Z" />
                        <path d="M224.19,101.07h0Z" />
                        <path d="M224.2,178.77h0Z" />
                        <path d="M279.68,173.21v0h0Z" />
                        <circle cx="274.14" cy="139.92" r="0.01" />
                        <path d="M224.2,162.11h0v0h0Z" />
                        <path d="M213.06,78.9H174.27v38.79h38.79Zm-5.54,33.24H179.83V84.45h27.69Z" />
                        <path d="M290.75,78.92H252V117.7h38.78Zm-5.53,33.23H257.53V84.46h27.69Z" />
                        <path d="M174.28,195.38h38.79V156.59H174.28Zm5.56-33.23h27.68v27.69H179.84Z" />
                        <path d="M224.19,101.07h0Z" />
                        <path
                            d="M229.77,95.55h5.54v5.54h5.54v5.5h5.52V95.52h-5.49V90h5.48v-11H218.67V90h5.53v11.08h5.57Zm0-11.1h5.49v5.49h-5.49Z" />
                        <path d="M190.9,128.83v16.6H179.78V140h-5.49V151h22.17V139.9h16.61v-5.54H202v-5.53Z" />
                        <path d="M190.89,128.83h0Z" />
                        <path d="M218.68,195.39h16.58v-5.54h-5.53v-5.54h-5.54v-5.54h-5.51Z" />
                        <path d="M224.2,178.77h0Z" />
                        <path d="M190.89,128.83h0Z" />
                        <path d="M174.29,123.31v11h5.52v-5.53h11.08v-5.51Z" />
                        <path d="M290.75,139.9V123.3h-11v5.54h5.53V139.9Z" />
                        <circle cx="201.99" cy="128.82" r="0.01" />
                        <path d="M213.06,123.31H202v5.51h11.06Z" />
                        <path d="M279.68,151h0Z" />
                        <path d="M285.21,145.51h-5.52V151h5.52Z" />
                        <path d="M290.75,156.59h-5.49v5.5h5.49Z" />
                        <path d="M240.83,117.72h0Z" />
                        <path d="M246.36,112.21h-5.51v5.51h5.51Z" />
                        <path d="M218.68,162.13v5.53h5.51v-5.53Z" />
                        <circle cx="224.19" cy="167.67" r="0.01" />
                        <path d="M279.68,173.21v0Z" />
                        <path d="M285.21,167.7h-5.52v5.51h5.52Z" />
                        <circle cx="274.14" cy="134.37" r="0.01" />
                        <path d="M279.65,139.92v-5.54h-5.51v5.54Z" />
                        <path d="M240.87,189.85h5.49v-5.5h-5.49Z" />
                        <path d="M257.5,189.87h0Z" />
                        <path d="M252,195.38h5.51v-5.51H252Z" />
                        <path d="M285.26,195.4h5.49v-5.5h-5.49Z" />
                        <path d="M246.39,145.48h0Z" />
                        <path d="M240.88,140v5.52h5.51V140Z" />
                        <path d="M202,90H185.37V106.6H202Z" />
                        <path d="M279.65,90H263.06v16.59h16.59Z" />
                        <path d="M185.37,184.28H202V167.69H185.37Z" />
                    </g>
                    <rect x="141.59" y="59.35" width="55.59" height="144.44" opacity="0.2" />
                    <path d="M93.78,165.35s8.31-39.14,29.25-39.14,32.06,61.52-18.86,68.22Z" fill="#f4a28c" />
                    <path d="M93.78,165.35s8.31-39.14,29.25-39.14,32.06,61.52-18.86,68.22Z" opacity="0.1" />
                    <rect x="112.09" y="55.02" width="80.11" height="142.37" fill="#a736ba"
                        class="target-color" />
                    <rect x="112.09" y="55.02" width="80.11" height="142.37" fill="#fff" opacity="0.46" />
                    <rect x="118.6" y="66.6" width="67.09" height="106.51" fill="#fff" />
                    <rect x="125.49" y="142.06" width="52.13" height="16.1" fill="#ffd200" />
                    <path d="M136.3,138.11s8.91,5.35,5.49,13.29-13.85,12.76-14,23.18,0,22.82,0,22.82H112.09V173.1Z"
                        opacity="0.1" />
                    <path
                        d="M110.17,150.81s16.16-16.52,23.14-15.05c5.75,1.21,5.76,12.67-6.78,22.21a22.25,22.25,0,0,0-8.83,16.23c-.35,5.34-2.11,11.68-7.53,16.48C98.79,200.76,90.34,192,91.44,178.37S93.28,160.73,110.17,150.81Z"
                        fill="#f4a28c" />
                    <polygon points="111.59 255.83 116.46 188.5 85.61 179.15 62.7 255.83 111.59 255.83" fill="#a736ba"
                        class="target-color" />
                    <polygon points="111.59 255.83 116.46 188.5 101.73 184.04 92.59 255.83 111.59 255.83"
                        opacity="0.1" />
                    <circle cx="134.58" cy="60.64" r="2.44" opacity="0.1" />
                    <rect x="141.79" y="59.79" width="25.79" height="2.22" rx="1.04"
                        opacity="0.1" />
                    <circle cx="150.25" cy="184.73" r="7.79" opacity="0.1" />
                    <polygon points="172.77 111.38 172.77 111.39 172.78 111.39 172.77 111.38" fill="#24285b" />
                    <polygon points="155.78 96.82 155.78 96.83 155.79 96.83 155.78 96.82" fill="#24285b" />
                    <path
                        d="M172.77,123.51v-2.42h-2.41v-4.86h2.41v-4.84h-2.43v-4.86h-2.41V104.1h2.41v-2.43h-2.43V99.24H155.78V96.83h-2.43V92h-2.42v4.83h-2.42V89.55h-2.43V109h-7.26v2.42h7.27v2.43h2.42c0,.81,0,1.62,0,2.42h2.41v2.44h-2.41v4.84h4.86V121.1h12.11v2.43h-4.83V126h2.42v2.42h4.86v2.42h2.42v-4.86h7.27v-2.42Zm-9.69-21.82h2.4v2.4h-2.4Zm-4.88,17h-2.4v-2.4h2.4Zm0-9.69v4.84h-2.43v-2.41h-2.42v2.42h-4.86v-2.42h2.41V109h-2.4v-4.86h4.83v-2.42h7.28v4.83h4.86V109h-7.27Zm4.84,7.27h-2.41v-2.41h2.41Zm4.84,2.42h-4.83v-2.41h4.83Zm0-7.28H165.5V109h2.41Z"
                        fill="#24285b" />
                    <polygon points="163.07 128.37 163.07 128.37 163.06 128.37 163.07 128.37" fill="#24285b" />
                    <polygon points="158.21 108.96 158.22 108.96 158.22 108.95 158.21 108.96" fill="#24285b" />
                    <polygon points="148.5 89.54 148.5 89.55 148.51 89.55 148.5 89.54" fill="#24285b" />
                    <polygon points="148.51 123.52 148.51 123.51 148.5 123.51 148.51 123.52" fill="#24285b" />
                    <polygon points="172.77 121.09 172.77 121.09 172.78 121.09 172.77 121.09" fill="#24285b" />
                    <circle cx="170.35" cy="106.53" fill="#24285b" />
                    <polygon points="148.51 116.23 148.5 116.23 148.5 116.24 148.51 116.24 148.51 116.23"
                        fill="#24285b" />
                    <path d="M143.64,79.85h-17v17h17Zm-2.43,14.53h-12.1V82.27h12.1Z" fill="#24285b" />
                    <path d="M177.61,79.85h-17v17h17Zm-2.42,14.53H163.08V82.28h12.11Z" fill="#24285b" />
                    <path d="M126.68,130.78h17v-17h-17Zm2.43-14.53h12.11v12.11H129.11Z" fill="#24285b" />
                    <polygon points="148.5 89.54 148.51 89.55 148.51 89.54 148.5 89.54" fill="#24285b" />
                    <path
                        d="M150.94,87.13h2.43v2.42h2.42V92h2.41V87.11h-2.4V84.68h2.4V79.85H146.09v4.84h2.42v4.85h2.43Zm0-4.86h2.4v2.4h-2.4Z"
                        fill="#24285b" />
                    <path d="M134,101.68v7.26h-4.87v-2.4h-2.4v4.83h9.7v-4.85h7.26V104.1H138.8v-2.42Z"
                        fill="#24285b" />
                    <polygon points="133.94 101.68 133.95 101.68 133.95 101.67 133.94 101.68" fill="#24285b" />
                    <path d="M146.1,130.79h7.25v-2.43h-2.42v-2.42H148.5v-2.42h-2.4Z" fill="#24285b" />
                    <polygon points="148.51 123.52 148.5 123.51 148.5 123.52 148.51 123.52" fill="#24285b" />
                    <polygon points="133.94 101.68 133.95 101.67 133.94 101.67 133.94 101.68" fill="#24285b" />
                    <path d="M126.68,99.26v4.83h2.42v-2.42h4.84V99.26Z" fill="#24285b" />
                    <path d="M177.61,106.52V99.26h-4.82v2.42h2.42v4.84Z" fill="#24285b" />
                    <circle cx="138.8" cy="101.68" fill="#24285b" />
                    <path d="M143.64,99.26H138.8v2.41h4.84Z" fill="#24285b" />
                    <polygon points="172.77 111.38 172.78 111.39 172.78 111.38 172.77 111.38" fill="#24285b" />
                    <path d="M175.19,109h-2.41v2.41h2.41Z" fill="#24285b" />
                    <path d="M177.61,113.82h-2.4v2.4h2.4Z" fill="#24285b" />
                    <polygon points="155.78 96.82 155.79 96.83 155.79 96.82 155.78 96.82" fill="#24285b" />
                    <path d="M158.2,94.41h-2.41v2.41h2.41Z" fill="#24285b" />
                    <path d="M146.09,116.24v2.42h2.41v-2.42Z" fill="#24285b" />
                    <circle cx="148.51" cy="118.66" fill="#24285b" />
                    <polygon points="172.77 121.09 172.78 121.09 172.78 121.09 172.77 121.09" fill="#24285b" />
                    <path d="M175.19,118.68h-2.41v2.41h2.41Z" fill="#24285b" />
                    <circle cx="170.35" cy="104.1" fill="#24285b" />
                    <path d="M172.76,106.53v-2.42h-2.41v2.42Z" fill="#24285b" />
                    <path d="M155.8,128.36h2.4V126h-2.4Z" fill="#24285b" />
                    <polygon points="163.07 128.37 163.06 128.37 163.06 128.37 163.07 128.37" fill="#24285b" />
                    <path d="M160.65,130.78h2.41v-2.41h-2.41Z" fill="#24285b" />
                    <path d="M175.21,130.79h2.4v-2.4h-2.4Z" fill="#24285b" />
                    <polygon points="158.21 108.96 158.22 108.95 158.21 108.95 158.21 108.96" fill="#24285b" />
                    <path d="M155.8,106.54V109h2.41v-2.41Z" fill="#24285b" />
                    <path d="M138.78,84.7h-7.25V92h7.25Z" fill="#24285b" />
                    <path d="M172.76,84.7H165.5V92h7.26Z" fill="#24285b" />
                    <path d="M131.53,125.93h7.25v-7.26h-7.25Z" fill="#24285b" />
                    <rect x="225.56" y="25.7" width="13.9" height="21.82" opacity="0.1" />
                    <rect x="185.69" y="213.58" width="94.03" height="5.62" fill="#fff"
                        opacity="0.46" />
                </svg>

            </div>
            <div class="text-center">
                <x-button data-modal-target="defaultModal"  id="scan">
                    {{ __('Scan QR') }}
                </x-button>
            </div>

            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Scan QR to Pay
                            </h3>
                            <button type="button"
                                class="scan-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="defaultModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <video id="scanner" width="100%" height="300px"></video>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <x-button class="scan-close">
                                {{ __('Close') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>


    @section('script')

        <script src="{{ asset('js/qr-scanner.umd.min.js') }}"></script>
        <script>
            $(document).ready(function() {

                const videoElem = document.getElementById('scanner')
                const qrScanner = new QrScanner(
                    videoElem,
                    function(result) {
                        if(result){
                            qrScanner.stop();
                            modal.hide();
                            const url = '{{ route('transfer',['to_phone' => '']) }}' + result;
                            return window.location.replace('/transfer?to_phone=' + result);
                        }
                    },
                );
                // set the modal menu element
                const $targetEl = document.getElementById('defaultModal');

                // options with default values
                const options = {
                    //   placement: 'bottom-right',
                    backdrop: 'dynamic',
                    backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
                    closable: false,
                    onHide: () => {
                        qrScanner.stop();
                    },
                    onShow: () => {
                        qrScanner.start();
                    },
                };


                const modal = new Modal($targetEl, options);
                $('#scan').click(function(){
                    modal.show();
                });
                $('.scan-close').click(function(){
                    modal.hide();
                });

            })
        </script>

    @endsection
</x-app-layout>
