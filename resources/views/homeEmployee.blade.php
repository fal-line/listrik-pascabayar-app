@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Halaman dashboard admin. Halo, ') }}
                    <strong>{{Auth::user()->employee->nama_karyawan}}</strong>

                    
                </div>
            </div>


            <div class="mt-4">
                <div class="row">

                    <hr>

                    <div class="col-sm-4 mt-4 ">
                        <div class="card">
                        <div class="card-header h4 py-3"><strong>Jumlah Pelanggan</strong></div>
                        <div class="card-body mb-5">
                            <h1 class="card-title">727</h1>
                            <p class="card-text">Jumlah pelanggan yang terdaftar pada sistem.</p>
                            <!-- <a href="#" class="btn btn-outline-primary">Kelola</a> -->
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4 ">
                        <div class="card">
                        <div class="card-header h4 py-3"><strong>Tagihan Aktif</strong></div>
                        <div class="card-body">
                            <h1 class="card-title">727</h1>
                            <p class="card-text">Jumlah tagihan aktif milik pelanggan yang belum lunas.</p>
                            <a href="#" class="btn btn-outline-primary">Kelola</a>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4 ">
                        <div class="card">
                        <div class="card-header h4 py-3"><strong>Pembayaran Aktif</strong></div>
                        <div class="card-body">
                            <h1 class="card-title">727</h1>
                            <p class="card-text">Jumlah pembayaran yang dilakukan pelanggan, menunggu konfirmasi.</p>
                            <a href="#" class="btn btn-outline-primary">Kelola</a>
                        </div>
                        </div>
                    </div>

                </div>
            </div>

                <div class="row">

                    <div class="col-sm-6 mt-4 ">
                        <div class="card ">
                        <div class="card-header"><strong>Data Tarif</strong></div>
                        <div class="card-body">
                            <!-- <h1 class="card-title">727</h1> -->
                            <p class="card-text">Kelola tarif dasar listrik.</p>
                            <a href="#" class="btn btn-outline-primary">Kelola</a>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-4 ">
                        <div class="card ">
                        <div class="card-header"><strong>Data Pelanggan</strong></div>
                        <div class="card-body">
                            <!-- <h1 class="card-title">727</h1> -->
                            <p class="card-text">Jumlah pelanggan yang terdaftar pada sistem.</p>
                            <a href="/clientData" class="btn btn-outline-primary">Kelola</a>
                        </div>
                        </div>
                    </div>

                    
                    @if (Auth::user()->ref_id_role == 1)
                    
                    <div class="col-sm-12 mt-4 ">
                        <div class="card ">
                        <div class="card-header"><strong>Data Karyawan</strong></div>
                        <div class="card-body">
                            <!-- <h1 class="card-title">727</h1> -->
                            <p class="card-text">Kelola data karyawan.</p>
                            <a href="#" class="btn btn-outline-primary">Kelola</a>
                        </div>
                        </div>
                    </div>

                    @endif

                </div>

            <div class="mt-4">
                        <div class="card-header h4 py-3"><strong>Pembayaran Terbaru</strong></div>
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
