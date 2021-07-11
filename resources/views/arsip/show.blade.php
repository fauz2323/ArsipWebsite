@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h1>asdasd</h1>
                <h1>{{ $data->nama_arsip }}</h1>
                @foreach ($data->files as $item)
                    <h1>{{ $item->path }}</h1>
                    <img src="{{asset('storage/' . $item->path)}}" class="img-fluid" alt="Gambar berkas">
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
