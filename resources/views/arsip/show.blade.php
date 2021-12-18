@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Data Murid') }}</div>
                    <div class="col p-5">
                        <h3>Kode Arsip : {{ $data->codeArsip->nama }}</h3>
                        <h3>Nama Arsip : {{ $data->nama_arsip }}</h3>
                        <h3>Keterangan Arsip : {{ $data->keterangan_arsip }}</h3>
                        @foreach ($data->files as $item)
                            <h2>Data Arsip</h2>
                            <img src="{{ asset('storage/' . $item->path) }}" class="img-fluid" alt="Gambar berkas">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
