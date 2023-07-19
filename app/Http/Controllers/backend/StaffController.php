<?php

namespace App\Http\Controllers\backend;

use App\Models\AdminUser;
use Jenssegers\Agent\Agent;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\StaffStoreRequest;
use App\Http\Requests\backend\StaffUpdateRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.staff.index');
    }
    public function getStaffs()
    {
        $data = AdminUser::query();
        return DataTables::of($data)
        ->editColumn('created_at', function ($row) {
            return 'Since ' .$row->created_at->format('Y, M d'); // Customize the date format as needed
        })
        ->editColumn('updated_at', function ($row) {
            return $row->updated_at->format('Y, M d h:m:s a'); // Customize the date format as needed
        })
        ->editColumn('user_agent',function($row){
            if($row->user_agent){
                $agent = new Agent();
                $agent->setUserAgent($row->user_agent);
                $device = $agent->device();
                $platform = $agent->platform();
                $browser = $agent->browser();

                $htmlTable = '<table class="">
                <tr ><th>Device</th><td class="text-yellow-500">'.$device.'</td></tr>
                <tr><th>Platform</th><td class="text-green-500">'.$platform.'</td></tr>
                <tr><th>Browser</th><td class="text-red-500">'.$browser.'</td></tr>
                </table>';

                return $htmlTable;
            }
        })
        ->addColumn('action', function ($row) {
            $edit_icon = '<a href="'.route('admin.staffs.edit',$row->id).'" class="text-yellow-500 mr-3 text-xl hover:text-yellow-300"> <i class="las la-edit"></i></a>';
            $delete_icon = '<a href="#" class="text-red-500 text-xl hover:text-red-300 confirm-delete" data-id="'.$row->id.'"> <i class="las la-trash"></i></a>';

            return ' <div class="action-icons">'. $edit_icon. $delete_icon.'</div> ';
        })
        ->rawColumns(['user_agent','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffStoreRequest $request)
    {
        $admin_user = new AdminUser();
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = Hash::make($request->password);
        $admin_user->save();

        return redirect()->route('admin.staffs.index')->with('created','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = AdminUser::findOrFail($id);
        return view('backend.staff.edit',compact('staff'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffUpdateRequest $request, $id)
    {
        $staff = AdminUser::findOrFail($id);
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->password = $request->password ? Hash::make($request->password) : $staff->password;
        $staff->save();

        return redirect()->route('admin.staffs.index')->with('updated','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = AdminUser::findOrFail($id);
        $staff->delete();
        return 'success';
    }
}
