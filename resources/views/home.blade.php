@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
                <div class="col">
                    <div class="card overflow-hidden radius-10">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                                <div class="w-50 p-3 bg-light-primary">
                                    <p>Total User</p>
                                    <h4 class="text-primary">{{ $user }}</h4>
                                </div>
                                <div class="w-50 bg-primary p-3">
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card overflow-hidden radius-10">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                                <div class="w-50 p-3 bg-light-primary">
                                    <p>Arsip Murid</p>
                                    <h4 class="text-primary">{{ $murid }}</h4>
                                </div>
                                <div class="w-50 bg-primary p-3">
                                    <div id="chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card overflow-hidden radius-10">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                                <div class="w-50 p-3 bg-light-primary">
                                    <p>Arsip Guru</p>
                                    <h4 class="text-primary">{{ $guru }}</h4>
                                </div>
                                <div class="w-50 bg-primary p-3">
                                    <div id="chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card overflow-hidden radius-10">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                                <div class="w-50 p-3 bg-light-primary">
                                    <p>Arsip Sekolah</p>
                                    <h4 class="text-primary">{{ $arsip }}</h4>
                                </div>
                                <div class="w-50 bg-primary p-3">
                                    <div id="chart4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
