<?php

namespace App\Http\Controllers;

use App\Models\CodeArsip;
use App\Models\MasterGuru;
use App\Models\MasterMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexMasterGuru(Request $request)
    {
        if ($request->ajax()) {
            $data = MasterGuru::orderBy('nama')->with('user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/addFileGuru/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Add Berkas</a> <a href="/edit/' . $row->id . ' /MasterGuru" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master.indexMasterGuru');
    }

    public function indexMasterMurid(Request $request)
    {
        if ($request->ajax()) {
            $data = MasterMurid::orderBy('nama')->with('user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/addFileMurid/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Add Berkas</a> <a href="/edit/' . $row->id . '/MasterMurid" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master.indexMasterMurid');
    }

    public function addFileGuru($id)
    {
        $data = MasterGuru::find($id);
        $code = CodeArsip::all();
        return view('guru.create',compact('data','code'));
    }


    public function addFileMurid($id)
    {
        $data = MasterMurid::find($id);
        $code = CodeArsip::all();
        return view('murid.create',compact('data','code'));
    }

    //store data master view
    public function masterGuru()
    {
        return view('master.creategurumaster');
    }

    public function masterMurid()
    {
        return view('master.createmuridmaster');
    }

    //store data

    public function storeMasterGuru(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'nik'=>'required',
        ]);

        MasterGuru::create([
            'id_akun'=>Auth::user()->id,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'NIK'=>$request->nik,
        ]);

        return redirect()->route('indexMasterGuru');
    }

    public function storeMasterMurid(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'nis'=>'required',
        ]);

        MasterMurid::create([
            'id_akun'=>Auth::user()->id,

            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'NIS'=>$request->nis,
        ]);

        return redirect()->route('indexMasterMurid');
    }

    //edit view

    public function editmasterGuru($id)
    {
        $data = MasterGuru::find($id);
        return view('master.editGuruMaster',compact('data'));
    }

    public function editmasterMurid($id)
    {
        $data = MasterMurid::find($id);
        return view('master.editMuridMaster',compact('data'));
    }

    //store data

    public function updateGuru(Request $request,$id)
    {
        $data = MasterGuru::find($id);
        $data->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'NIK'=>$request->nik,
        ]);

        return redirect()->route('indexMasterGuru');
    }

    public function updateMurid(Request $request,$id)
    {
        $data = MasterMurid::find($id);
        $data->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'NIS'=>$request->nis,
        ]);

        return redirect()->route('indexMasterMurid');
    }
}
