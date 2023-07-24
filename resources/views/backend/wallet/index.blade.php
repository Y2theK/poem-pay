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
               <tbody class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 "></tbody>

            </table>
        </div>
    </div>



@endsection
@section('script')

    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#walletDatatable').DataTable({
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
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
