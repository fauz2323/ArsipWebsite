@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('kode.update',$code->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="m-4">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Kode Arsip</label>
                        <input type="text" class="form-control" name="nama" value="{{ $code->nama }}" placeholder="{{ $code->nama }}">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan Arsip</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ $code->keterangan }}" placeholder="{{ $code->keterangan }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
