@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Data Murid') }}</div>
                    <div class="col p-5">
                        <h3>Nama Guru : {{ $data->nama }}</h3>
                        <h3>Alamat : {{ $data->alamat }}</h3>
                        <h3>NIK : {{ $data->NIK }}</h3>
                        @foreach ($data->fileGuru as $item)
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
