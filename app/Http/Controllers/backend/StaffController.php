<?php

namespace App\Http\Controllers\backend;

use App\Models\AdminUser;
use Jenssegers\Agent\Agent;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\StaffStoreRequest;
use App\Http\Requests\backend\StaffUpdateRequest;
use App\Services\StaffService;

class StaffController extends Controller
{
    public function __construct(protected StaffService $staffService)
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.staff.index');
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
        $data  = $request->validated();
        $data['password'] = Hash::make($request->password);
        $staff = $this->staffService->store($data);
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
        $data = $request->validated();
        $data['password'] = $request->password ? Hash::make($request->password) : $staff->password;
        $staff = $this->staffService->update($staff,$data);

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
        $this->staffService->delete($staff);
        return 'success';
    }
}
