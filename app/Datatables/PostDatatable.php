<?php

namespace App\Datatables;

use App\Models\Post;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Builder;
use App\Datatables\Contract\DatatableInterface;

class PostDatatable implements DatatableInterface {
    public function getPosts()
    {
        $data = Post::with('user')->withCount(['reactions','comments','shares']);
        return $this->datatable($data);
    }
    
    public function datatable(Builder $query){

        return DataTables::of($query)
                            ->editColumn('created_at', function ($row) {
                                return 'Since ' . $row->created_at->format('Y, M d'); // Customize the date format as needed
                            })
                            ->editColumn('is_exchanged', function ($row) {
                                return $row->is_exchanged ? true : false; // Customize the date format as needed
                            })
                            ->addColumn('user',function($row){
                                return $row->user ? $row->user->name : 'N/A';
                            })
                            ->addColumn('action', function ($row) {
                                $edit_icon = '<a href="' . route('admin.posts.edit', $row->id) . '" class="text-yellow-500 mr-3 text-xl hover:text-yellow-300"> <i class="las la-edit"></i></a>';
                                $delete_icon = '<a href="#" class="text-red-500 text-xl hover:text-red-300 confirm-delete" data-id="' . $row->id . '"> <i class="las la-trash"></i></a>';

                                return ' <div class="action-icons">' . $edit_icon . $delete_icon . '</div> ';
                            })
                            ->rawColumns(['action'])
                            ->make(true);
    }
}