@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Data Murid') }}</div>
                    <div class="col p-5">
                        {{-- <h3>Nama Murid : {{ $data->nama }}</h3>
                        <h3>Alamat : {{ $data->alamat }}</h3>
                        <h3>NIS : {{ $data->NIS }}</h3> --}}

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama Murud</td>
                                        <td>:</td>
                                        <td> {{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 3cm">Alamat</td>
                                        <td style="width: 1cm">:</td>
                                        <td> {{ $data->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIs</td>
                                        <td>:</td>
                                        <td> {{ $data->NIS }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-3">
                            @foreach ($data->filesMurid as $item)
                        <div class="col-md-3">
                            <div class="card">
                              <div class="card-body">
                                <div>
                                  <h5 class="card-title">Data Murid {{ $loop->iteration }}</h5>
                                </div>
                                <a href="{{ asset('storage/' . $item->path) }}" class="btn btn-primary" download>Download
                                    Data</a>
                              </div>
                            </div>
                          </div>

                            {{-- <div class="col">
                                <h2>Data Guru {{ $loop->iteration }} :</h2>
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
    </div>
@endsection
