@extends('backend.layouts.app')
@section('title', 'Wallet Management')
@section('breadcrumb', 'Wallet Management')
@section('content')
    <!--/container-->
    <div class="w-full mb-8 overflow-hidden rounded-lg">
      
        <div class="w-full overflow-x-auto">

            <table id="walletDatatable" class=" stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Account Number</th>
                        <th data-priority="3">Account Person</th>
                        <th data-priority="6">Amount (MMK)</th>
                        <th data-priority="5">Created date</th>
                        <th data-priority="9">Updated At</th>

                    </tr>
                </thead>
               <tbody class="text-xs font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 "></tbody>

            </table>
        </div>
    </div>
  
  <!-- Amount modal -->
  <div id="amountModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-3">
              <button type="button" class="amount-close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <form class="space-y-6 amount-form" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <h5 class="mb-4 font-medium text-gray-900  dark:text-white" id="amountLabel">Update user's wallet amount</h5>
                    {{-- <hr> --}}
                      <div>
                          <input style="color: black" type="number" name="amount" id="amount" autofocus class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="100,000" required>
                      </div>
                    <div class="text-right">
                    <button type="button" class="amount-close text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    <button  type="submit" class="amount-update text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center ml-2">
                        Yes, I'm sure
                    </button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div> 
  



@endsection
@section('script')

    <script type="text/javascript">
        $(document).ready(function() {
            let modal;
            var id,amount,name;
            $(document).on('click','.amount-edit-btn',function(e){
                 e.preventDefault();
                 id = $(this).data('id');
                 amount = $(this).data('amount');
                 name = $(this).data('name');
            // set the modal menu element
            const $targetEl = document.getElementById('amountModal');

            // options with default values
            const options = {
                //   placement: 'bottom-right',
                backdrop: 'dynamic',
                backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
                closable: false,
                onHide: () => {
                    // qrScanner.stop();
                },
                onShow: () => {
                    $('#amount').val(amount);
                    $('#amount').attr('data-id',id);
                    $('#amountLabel').text(`Update ${name}'s Wallet Amount`);
                   
                },
            };

            modal = new Modal($targetEl, options);

                modal.show();
            });
            $(document).on('click','.amount-update',function(e){
                e.preventDefault();
                $.ajax({
                    url : "{{ route('admin.amount_update','')}}" + '/' +  id,
                    type : 'POST',
                    data : { 'amount': $('#amount').val(), 'id': $('#amount').attr('data-id') },
                    success : function(res){
                        modal.hide();
                        if(res.status == 'success'){
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Update',
                                    text: res.message,
                            })
                            table.ajax.reload();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            });
                        }
                    }
                })
            })
            $('.amount-close').click(function(){
                 modal.hide();
            });

            var table = $('#walletDatatable').DataTable({
                    "ajax": "{{ route('admin.wallets_ssd') }}",
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'account_number', name: 'account_number'},
                        {data: 'account_person', name: 'account_person'},
                        {data: 'amount', name: 'amount'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'updated_at', name: 'updated_at'},
                        
                    ],
                    "order": [
                        [5, 'desc'] //default order updated_at desc
                    ]
                })
                .columns.adjust()
                .responsive.recalc();
       
        });
    </script>
@endsection
