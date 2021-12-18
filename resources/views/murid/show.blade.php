@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Data Murid') }}</div>
                    <div class="col p-5">
                        <h3>Nama Murid : {{ $data->nama }}</h3>
                        <h3>Alamat : {{ $data->alamat }}</h3>
                        <h3>NIS : {{ $data->NIS }}</h3>
                        @foreach ($data->filesMurid as $item)

                            <div class="col">
                                <h2>Data Murid {{ $loop->iteration }} :</h2>
                                <a href="{{ asset('storage/' . $item->path) }}" class="btn btn-primary" download>Download
                                    Data</a>
                            </div>
                            {{-- <img src="{{ asset('storage/' . $item->path) }}" class="img-fluid" alt="Gambar berkas"> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
