<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ArsipPost;
use App\Models\CodeArsip;
use Illuminate\Database\Eloquent\Collection;

class ArsipPostController extends Controller
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
        $arsip = ArsipPost::with('codeArsip')->simplePaginate(3);
        $count = 1;

        // return view('arsip.index' , ['arsip' => $arsip, 'jpg' => $jpg]);
        return view('arsip.index', compact('arsip', 'count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = CodeArsip::all();
        return view('arsip.create', compact('code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $arsip = ArsipPost::create([
            'code_id' => $request->code_id,
            'nama_arsip' => $request->nama,
            'keterangan_arsip' => $request->keterangan,
            'jenis_data' => 'jpg',
        ]);

        foreach ( $request->file('file') as $key ) {

            $path = Storage::disk('public')->putFile('filez', $key);
            $files = [
                'arsip_id' => $arsip->id,
                'path' => $path,
            ];
            $arsip->files()->create($files);
        }

        return redirect()->route('arsip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ArsipPost::findOrFail($id);
        return view('arsip.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ArsipPost::findOrFail($id);
        $code = CodeArsip::all();
        return view('arsip.edit', compact('data','code'));
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
        $arsip = ArsipPost::findOrFail($id);
        if ($request->hasFile('file')) {
            foreach ($arsip->files as $key) {

                Storage::delete('public/'. $key->path);

            }
            $arsip->files()->delete();
            foreach ($request->file('file') as $key) {

                $path = Storage::disk('public')->putFile('filez', $key);
                $files = [
                    'arsip_id' => $arsip->id,
                    'path' => $path,
                ];
                $arsip->files()->create($files);
            }
        }
        $data = [
            'code_id' => $request->code_id,
            'nama_arsip' => $request->nama,
            'keterangan_arsip' => $request->keterangan,
        ];
        $arsip->update($data);
        return redirect()->route('arsip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ArsipPost::findOrFail($id);
        foreach ($delete->files as $key ) {
            $count = 1;
            Storage::delete('public/'.$key->path);
            $count++;
        }
        $delete->delete();
        return redirect()->route('arsip.index');
    }
}