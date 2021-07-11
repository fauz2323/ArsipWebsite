@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="m-3">
                    <a href="{{ route('arsip.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="m-4">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Arsip</th>
                            <th scope="col">nama File</th>
                            <th scope="col">keterangan File</th>
                            <th scope="col">Tanggal upload</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($arsip as $item)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $item->codeArsip->nama }}</td>
                                <td>{{ $item->nama_arsip }}</td>
                                <td>{{ $item->keterangan_arsip }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ route('arsip.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mr-2 btn btn-sm btn-danger float-left"
                                        onclick="return confirm('are you sure?');">Delete</button>
                                        <a href="{{ route('arsip.edit', $item->id) }}"
                                        class="btn btn-sm btn-info float-left text-white">Edit</a>
                                        <a href="{{ route('arsip.show', $item->id) }}"
                                            class="btn btn-sm btn-info float-left text-white">Lihat</a>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="row d-flex justify-content-end m-3">
                        {{ $arsip->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

