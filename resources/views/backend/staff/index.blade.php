@extends('backend.layouts.app')
@section('title', 'Staff Management')
@section('breadcrumb', 'Staff Management')
@section('content')

    <!--/container-->
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">

            <table id="staffDataTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Name</th>
                        <th data-priority="3">Email</th>
                        <th data-priority="4">Phone</th>
                        <th data-priority="5">Joined date</th>
                    </tr>
                </thead>
                <tbody class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 "></tbody>


            </table>
        </div>
    </div>



@endsection
@section('script')

    <script>
        $(document).ready(function() {

            var table = $('#staffDataTable').DataTable({
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('admin.staffs_ssd') }}",
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'phone', name: 'phone'},
                        {data: 'joined_date', name: 'joined_date'},
                    ]
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
