<?php

namespace App\Http\Controllers\backend;

use App\Helpers\UUIDGenerater;
use App\Models\User;
use App\Models\Wallet;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\UserStoreRequest;
use App\Http\Requests\backend\UserUpdateRequest;

//use Yajra\DataTables\Facades\DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user.index');
    }

    public function getUsers()
    {
        $data = User::query();
        return DataTables::of($data)
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
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            Wallet::firstOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'account_number' => UUIDGenerater::accountNumber(),
                    'amount' => 0
                ]
            );

            DB::commit();
            return redirect()->route('admin.users.index')->with('created', 'Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
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
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password ? Hash::make($request->password) : $user->password;
            $user->save();

            Wallet::firstOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'account_number' => UUIDGenerater::accountNumber(),
                    'amount' => 0
                ]
            );

            DB::commit();
            return redirect()->route('admin.users.index')->with('updated', 'Successfully Updated');
        } catch (\Exception $e) {
            DB::rollBack();
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
        $user->delete();
        return 'success';
    }
}
