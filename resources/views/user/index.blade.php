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
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <th scope="row"> </th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <form action="{{ route('userdel', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mr-2 btn btn-sm btn-danger float-left"
                                    onclick="return confirm('are you sure?');">Delete</button>
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
