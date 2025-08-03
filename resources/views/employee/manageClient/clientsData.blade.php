@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            
            <div class="mb-5">
                        <div class="card-header h4 py-3"><strong>Data Pelanggan</strong></div>
                        <a href="/clientData/baru" class="text-white align-middle">
                            <button type="button" class="btn btn-outline-primary ">
                                Daftar Pelanggan Baru
                            </button>
                        </a>
            
            </div>
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
                                <a href="/clientData/{{ $pelanggan->user_id }}" class="text-white align-middle">
                                    <button type="button" class="btn btn-outline-primary ">
                                        Detail
                                    </button>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
