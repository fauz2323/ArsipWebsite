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
                                <label for="exampleFormControlInput1" class="form-label">Kode Arsip</label>
                                <select class="form-control" name="code_id" aria-label="Default select example">
                                    <option selected disabled>Pilih Kode Arsip</option>
                                    @foreach ($code as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" value="{{ $data->nama }}" name="nama" placeholder="nama Guru">
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
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan"
                                    rows="3"></textarea>
                            </div>
                            <div class="form-group increment">
                                <label for="">file berkas</label>
                                <div class="input-group">
                                    <input type="file" name="file[]" class="form-control">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-primary btn-add"><i
                                                class="fas fa-plus-square"></i></button>
                                    </div>
                                </div>
                                @error('file[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="clone invisible">
                                <div class="input-group mt-2">
                                    <input type="file" name="file[]" class="form-control">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-danger btn-remove"><i
                                                class="fas fa-minus-square"></i></button>
                                    </div>
                                </div>
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
    @push('script')
        <script>
            jQuery(document).ready(function() {
                jQuery(".btn-add").click(function() {
                    let markup = jQuery(".invisible").html();
                    jQuery(".increment").append(markup);
                });
                jQuery("body").on("click", ".btn-remove", function() {
                    jQuery(this).parents(".input-group").remove();
                })
            })
        </script>
    @endpush
@endsection
