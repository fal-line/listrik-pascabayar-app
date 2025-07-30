@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            
            <div class="mt-4">
                        <div class="card-header h4 py-3"><strong>Data Pelanggan</strong></div>
                        <button type="button" class="btn btn-outline-primary mb-4">
                            Daftar Pelanggan Baru
                        </button>
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">UID User</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor KwH</th>
                    <th scope="col">Kelas Daya</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $pelanggan)
                        <tr>
                            <th scope="row" class="align-middle">{{$pelanggan->user_id}}</th>
                            <td class="align-middle">{{$pelanggan->nama_pelanggan}}</td>
                            <td class="align-middle">{{$pelanggan->nomor_kwh}}</td>
                            <td class="align-middle">{{$pelanggan->daya}}</td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-outline-primary ">
                                    Detail
                                </button>
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
