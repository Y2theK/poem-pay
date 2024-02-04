<?php

namespace App\Http\Controllers\backend;

use App\Datatables\UserDatatable;
use App\Helpers\UUIDGenerater;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\UserStoreRequest;
use App\Http\Requests\backend\UserUpdateRequest;
use App\Services\UserService;

//use Yajra\DataTables\Facades\DataTables;
class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($request->password);
            $user = $this->userService->store($data);

            return redirect()->route('admin.users.index')->with('created', 'Created Successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['failed' => 'Something Wrong'])->withInput();
        }
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
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $data = $request->validated();
            $data['password'] = $request->password ? Hash::make($request->password) : $user->password;
            $user = $this->userService->update($user,$data);
            return redirect()->route('admin.users.index')->with('updated', 'Successfully Updated');

        } catch (\Exception $e) {
            return back()->withErrors(['failed' => 'Something Wrong'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->userService->delete($user);
        return 'success';
    }
}
