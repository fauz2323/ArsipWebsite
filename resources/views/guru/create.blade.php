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
                                <input type="text" class="form-control" name="nama" placeholder="nama Guru">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Induk</label>
                                <input type="text" class="form-control" name="nis" placeholder="Nomor Induk">
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
