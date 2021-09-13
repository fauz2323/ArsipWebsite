@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="m-3">
                    <a href="{{ route('kode.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Arsip</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row"> </th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <form action="{{ route('kode.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mr-2 btn btn-sm btn-danger float-left"
                                    onclick="return confirm('are you sure?');">Delete</button>
                                    <a href="{{ route('kode.edit', $item->id) }}"
                                    class="btn btn-sm btn-info float-left text-white">Edit</a>
                                </form>
                            </td>
                          </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection
