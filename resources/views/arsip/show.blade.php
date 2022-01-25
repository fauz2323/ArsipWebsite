@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Data Arsip Sekolah') }}</div>
                    <div class="col p-5">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Kode Arsip</td>
                                        <td>:</td>
                                        <td> {{ $data->codeArsip->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 3cm">Nama Arsip</td>
                                        <td style="width: 1cm">:</td>
                                        <td> {{ $data->nama_arsip }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan Arsip</td>
                                        <td>:</td>
                                        <td> {{ $data->keterangan_arsip }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        @foreach ($data->files as $item)
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                  <img src="{{ url('/').'/storage/'.$item->path }}" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">Data Arsip {{ $loop->iteration }}</h5>

                                  </div>
                                </div>
                              </div>
                        </div>
                            {{-- <div class="col">
                                <h2>Data Arsip {{ $loop->iteration }} :</h2>
                                <a href="{{ asset('storage/' . $item->path) }}" class="btn btn-primary" download>Download
                                    Data</a>
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
