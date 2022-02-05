@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="m-4">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" value="{{ $data->nama }}"  name="nama" placeholder="nama Guru">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" value="{{ $data->alamat }}" name="alamat" placeholder="Alamat">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Induk</label>
                                <input type="text" class="form-control" value="{{ $data->NIK }}" name="nik" placeholder="Nomor Induk">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
