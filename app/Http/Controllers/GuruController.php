<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Murid;
use Illuminate\Database\Eloquent\Collection;

class GuruController extends Controller
{
    public function __construct()
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
            $data = GuruModel::orderBy('nama')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/guruDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete User</a> <a href="/guru/' . $row->id . ' /edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $murid = GuruModel::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'NIK' => $request->nik,
        ]);

        foreach ($request->file('file') as $key) {

            $path = Storage::disk('public')->putFile('filezMurid', $key);
            $files = [
                'guru_id' => $murid->id,
                'path' => $path,
            ];
            $murid->fileGuru()->create($files);
        }

        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = GuruModel::findOrFail($id);
        return view('guru.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = GuruModel::findOrFail($id);
        return view('guru.edit', compact('data'));
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
        $murid = GuruModel::findOrFail($id);
        if ($request->hasFile('file')) {
            foreach ($murid->fileGuru as $key) {

                Storage::delete('public/' . $key->path);
            }
            $murid->fileGuru()->delete();
            foreach ($request->file('file') as $key) {

                $path = Storage::disk('public')->putFile('filez', $key);
                $files = [
                    'guru_id' => $murid->id,
                    'path' => $path,
                ];
                $murid->fileGuru()->create($files);
            }
        }
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'NIK' => $request->nik,
        ];
        $murid->update($data);
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = GuruModel::findOrFail($id);
        foreach ($delete->fileGuru as $key) {
            Storage::delete('public/' . $key->path);
        }
        $delete->delete();
        return redirect()->route('guru.index');
    }
}
