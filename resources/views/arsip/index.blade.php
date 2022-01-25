@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Data</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <a href="{{ route('arsip.create') }}" class="btn btn-primary mb-3">Add data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30px">number</th>
                                <th>Kode Arsip</th>
                                <th>Nama Arsip</th>
                                <th>Uploader</th>
                                <th>Keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '',
                columns: [{
                        data: 'no',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'code_arsip.nama',
                        name: 'code_arsip.nama'
                    },
                    {
                        data: 'nama_arsip',
                        name: 'nama_arsip'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    }, {
                        data: 'keterangan_arsip',
                        name: 'keterangan_arsip'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });
        });
    </script>
@endpush
