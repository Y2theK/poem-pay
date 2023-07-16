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
                        <th data-priority="6">Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $staff->id }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ $staff->phone }}</td>
                            <td>{{ $staff->created_at }}</td>
                            <td>${{ rand(100000, 999999) }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>



@endsection
@section('script')

    <script>
        $(document).ready(function() {

            var table = $('#staffDataTable').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
