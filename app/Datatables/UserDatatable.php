<?php

namespace App\Datatables;

use App\Models\User;
use Jenssegers\Agent\Agent;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Builder;
use App\Datatables\Contract\DatatableInterface;

class UserDatatable implements DatatableInterface {
    public function getUsers()
    {
        $data = User::query();
        return $this->datatable($data);
    }
    
    public function datatable(Builder $query){

        return DataTables::of($query)
                            ->editColumn('created_at', function ($row) {
                                return 'Since ' . $row->created_at->format('Y, M d'); // Customize the date format as needed
                            })
                            ->editColumn('updated_at', function ($row) {
                                return $row->updated_at->format('Y, M d h:m:s a'); // Customize the date format as needed
                            })
                            ->editColumn('user_agent', function ($row) {
                                if ($row->user_agent) {
                                    $agent = new Agent();
                                    $agent->setUserAgent($row->user_agent);
                                    $device = $agent->device();
                                    $platform = $agent->platform();
                                    $browser = $agent->browser();

                                    $htmlTable = '<table class="">
                                <tr ><th>Device</th><td class="text-yellow-500">' . $device . '</td></tr>
                                <tr><th>Platform</th><td class="text-green-500">' . $platform . '</td></tr>
                                <tr><th>Browser</th><td class="text-red-500">' . $browser . '</td></tr>
                                </table>';

                                    return $htmlTable;
                                }
                            })
                            ->addColumn('action', function ($row) {
                                $edit_icon = '<a href="' . route('admin.users.edit', $row->id) . '" class="text-yellow-500 mr-3 text-xl hover:text-yellow-300"> <i class="las la-edit"></i></a>';
                                $delete_icon = '<a href="#" class="text-red-500 text-xl hover:text-red-300 confirm-delete" data-id="' . $row->id . '"> <i class="las la-trash"></i></a>';

                                return ' <div class="action-icons">' . $edit_icon . $delete_icon . '</div> ';
                            })
                            ->rawColumns(['user_agent', 'action'])
                            ->make(true);
    }
}