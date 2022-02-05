<?php

namespace App\Http\Controllers;

use App\Models\CodeArsip;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Murid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class MuridController extends Controller
{
    public function __cnstruct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Murid::orderBy('nama')->with('user','codeArsip')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/muridDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete User</a> <a href="/murid/' . $row->id . ' /edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a> <a href="/murid/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editCustomer">Lihat</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        // return view('arsip.index' , ['arsip' => $arsip, 'jpg' => $jpg]);
        return view('murid.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = CodeArsip::all();

        return view('murid.create', compact('code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nis' => 'required',
            'file' => 'required'
        ]);

        $murid = Murid::create([
            'id_akun' => Auth::user()->id,
            'code_id' => $request->code_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nis' => $request->nis,
            'keterangan' => $request->keterangan ?? '-',
        ]);

        foreach ($request->file('file') as $key) {

            $path = Storage::disk('public')->putFile('filezMurid', $key);
            $files = [
                'murid_id' => $murid->id,
                'path' => $path,
            ];
            $murid->filesMurid()->create($files);
        }

        return redirect()->route('murid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Murid::findOrFail($id);
        return view('murid.show', compact('data'));
        // dd($data->filesMurid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Murid::findOrFail($id);
        $code = CodeArsip::all();

        return view('murid.edit', compact('data', 'code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nis' => 'required',
            'file' => 'required'
        ]);

        $murid = Murid::findOrFail($id);
        if ($request->hasFile('file')) {
            foreach ($murid->filesMurid as $key) {

                Storage::delete('public/' . $key->path);
            }
            $murid->filesMurid()->delete();
            foreach ($request->file('file') as $key) {

                $path = Storage::disk('public')->putFile('filez', $key);
                $files = [
                    'murid_id' => $murid->id,
                    'path' => $path,
                ];
                $murid->filesMurid()->create($files);
            }
        }
        $data = [
            'id_akun' => Auth::user()->id,
            'code_id' => $request->code_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nis' => $request->nis,
            'keterangan' => $request->keterangan ?? '-',
        ];
        $murid->update($data);
        return redirect()->route('murid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Murid::findOrFail($id);
        foreach ($delete->filesMurid as $key) {
            Storage::delete('public/' . $key->path);
        }
        $delete->delete();
        return redirect()->route('murid.index');
    }
}
