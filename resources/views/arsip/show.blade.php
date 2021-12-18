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
                            <div class="col">
                                <h2>Data Arsip {{ $loop->iteration }} :</h2>
                                <a href="{{ asset('storage/' . $item->path) }}" class="btn btn-primary" download>Download
                                    Data</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
