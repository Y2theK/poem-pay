@extends('backend.layouts.app')
@section('title', 'Transaction Management')
@section('breadcrumb', 'Transaction Management')
@section('content')
    <!--/container-->
    <div class="w-full mb-8 overflow-hidden rounded-lg">
      
        <div class="w-full overflow-x-auto">

            <table id="transactionDatatable" class=" stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Ref ID</th>
                        <th data-priority="2">User</th>
                        <th data-priority="2">Source</th>
                        <th data-priority="3">Type</th>
                        <th data-priority="6">Amount (MMK)</th>
                        <th data-priority="5">Date</th>
                        <th data-priority="9">Note</th>

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

            var table = $('#transactionDatatable').DataTable({
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.transactions_ssd') }}",
                    "columns": [
                    
                        {data: 'trx_id', name: 'trx_id'},
                        {data: 'ref_no', name: 'ref_no'},
                        {data: 'user_id', name: 'user_id'},
                        {data: 'source_id', name: 'source_id'},
                        {data: 'type', name: 'type'},
                        {data: 'amount', name: 'amount'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'description', name: 'description'},
                        
                    ],
                    "order": [
                        [6, 'desc'] //default order updated_at desc
                    ]
                })
                .columns.adjust()
                .responsive.recalc();
       
        });
    </script>
@endsection
