<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Murid;
use Illuminate\Database\Eloquent\Collection;

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
    public function index()
    {
        $murid = Murid::orderBy('nama')->simplePaginate(3);

        // return view('arsip.index' , ['arsip' => $arsip, 'jpg' => $jpg]);
        return view('murid.index', compact('murid'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('murid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $murid = Murid::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nis' => $request->nis,
        ]);

        foreach ( $request->file('file') as $key ) {

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
        return view('murid.edit', compact('data'));
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
        $murid = Murid::findOrFail($id);
        if ($request->hasFile('file')) {
            foreach ($murid->filesMurid as $key) {

                Storage::delete('public/'. $key->path);

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
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nis' => $request->nis,
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
        foreach ($delete->filesMurid as $key ) {
            Storage::delete('public/'.$key->path);
        }
        $delete->delete();
        return redirect()->route('murid.index');
    }
}
