@extends('backend.layouts.app')
@section('title', 'Post Management')
@section('breadcrumb', 'Post Management')
@section('content')
    <!--/container-->
    <div class="w-full mb-8 overflow-hidden rounded-lg">
      <a href="{{ route('admin.posts.create') }}"
            class="px-4 inline-block mb-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
            <i class="las la-plus"></i>
            {{ __('Create New Post') }}
        </a>
        <div class="w-full overflow-x-auto">

            <table id="postDatatable" class=" stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Title</th>
                        <th data-priority="3">User</th>
                        <th data-priority="4">Is Exchanged</th>
                        <th data-priority="5">Posted date</th>
                        <th data-priority="8" class="no-sort">Action</th>

                    </tr>
                </thead>
               <tbody class="text-xs font-semibold tracking-wide text-left text-gray-500  border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 "></tbody>

            </table>
        </div>
    </div>



@endsection
@section('script')

    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#postDatatable').DataTable({
                    "ajax": "{{ route('admin.posts_ssd') }}",
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'user', name: 'user'},
                        {data: 'is_exchanged', name: 'is_exchanged'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action',searchable: false},
                    ],
                    "order": [
                        [0, 'desc'] //default order updated_at desc
                    ]
                })
                .columns.adjust()
                .responsive.recalc();

                $(document).on('click','.confirm-delete',function(e){
                e.preventDefault();
                var id = $(this).data('id');
               Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'bg-purple-600',
                    cancelButtonColor: 'bg-transparent',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : "{{ route('admin.posts.destroy','') }}" + '/' + id,
                            type : 'DELETE',
                            success : function(){
                                Swal.fire(
                                    'Deleted!',
                                    'Post has been deleted.',
                                    'success'
                                )
                              
                              table.ajax.reload();
                            }
                        })
                        
                    }
                });
            });
        });
    </script>
@endsection
