<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/admin-user/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete User</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.index');
    }

    public function role(Request $request)
    {
        if ($request->ajax()) {
            $data = User::role('staff')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="change/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Add Admin</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user.role');
    }

    public function changeRole($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->assignRole('admin');
        return redirect()->route('role');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'Data berhasil dihapus!');
    }

    public function add(Request $request)
    {
        $user = User::create([
            'name' => $request->name1,
            'email' => $request->email1,
            'password' => Hash::make($request->password1)

        ]);

        $user->assignRole('staff');

        return redirect()->route('user');
    }
}
