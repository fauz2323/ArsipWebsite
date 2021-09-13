@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="m-3">
                    <a href="{{ route('murid.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="m-4">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Murid</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Tanggal upload</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($murid as $item)
                            <tr>
                                <th scope="row"> </th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ route('murid.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mr-2 btn btn-sm btn-danger float-left"
                                        onclick="return confirm('are you sure?');">Delete</button>
                                        <a href="{{ route('murid.edit', $item->id) }}"
                                        class="btn btn-sm btn-info float-left text-white">Edit</a>
                                        <a href="{{ route('murid.show', $item->id) }}"
                                            class="btn btn-sm btn-info float-left text-white">Lihat</a>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="row d-flex justify-content-end m-3">
                        {{ $murid->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

