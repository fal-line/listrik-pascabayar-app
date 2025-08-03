@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            
            <div class="mt-4">
                <a href="/clientData">Kembali ke data client</a>
                        <div class="card-header h4 py-3"><strong>Detail Data Pelanggan</strong></div>
                        
                    @foreach($pelanggans as $pelanggan)

                    <form method="POST" action="/clientData/delete/{{$pelanggan->id}}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="delete-target" value="{{$pelanggan->id}}">
                        <button type="submit" class="btn btn-outline-danger mb-4">
                            Hapus data pelanggan
                        </button>
                    </form>

                    <hr  class="mt-2">


                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-6 mt-4 ">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-secondary text-white" id="basic-addon1">UID User</span> 
                                    <input type="text" class="form-control" placeholder="{{$pelanggan->user_id}}" aria-label="{{$pelanggan->user_id}}" value="{{$pelanggan->user_id}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4 ">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-secondary text-white" id="basic-addon1">ID Client</span> 
                                    <input type="text" class="form-control" placeholder="{{$pelanggan->id}}" aria-label="{{$pelanggan->id}}" value="{{$pelanggan->id}}" disabled>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-6 mt-4 ">
                                <h4>Email</h4>
                                <input type="text" class="form-control" id="email" placeholder="{{$pelanggan->email}}" aria-label="{{$pelanggan->email}}" value="{{$pelanggan->email}}">
                            </div>

                            <div class="col-sm-6 mt-4 ">
                                <h4>Password</h4>
                                <a href="#" class="text-white align-middle">
                                    <button type="button" class="btn btn-warning col-sm-12">
                                        Kirim email konfirmasi ubah password
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-6 mt-4 ">
                                <h4>Tanggal Daftar</h4>
                                <input type="text" class="form-control bg-secondary text-white" placeholder="{{$pelanggan->created_at}}" aria-label="{{$pelanggan->created_at}}" value="{{$pelanggan->created_at}}" disabled>
                            </div>

                            <div class="col-sm-6 mt-4 ">
                                <h4>Domisili Pelanggan</h4>
                                <input type="text" class="form-control bg-secondary text-white" placeholder="Jauh, Pake Helm" aria-label="Jauh, Pake Helm" value="Jauh, Pake Helm" disabled>
                            </div>

                        </div>
                    </div>

                    <hr  class="mt-4">

                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-6 mt-4 ">
                                <h4>Nomor KwH</h4>
                                <input type="text" id="nomor_kwh" class="form-control" placeholder="{{$pelanggan->nomor_kwh}}" aria-label="{{$pelanggan->nomor_kwh}}" value="{{$pelanggan->nomor_kwh}}">
                            </div>

                            <div class="col-sm-6 mt-4 ">
                                <h4>Nama Pelanggan</h4>
                                <input type="text" id="nama_pelanggan" class="form-control" placeholder="{{$pelanggan->nama_pelanggan}}" aria-label="{{$pelanggan->nama_pelanggan}}" value="{{$pelanggan->nama_pelanggan}}">
                            </div>

                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="row">
                            <div class="col-sm-8 mt-4 ">
                                <h4>Kelas tarif listrik</h4>
                                <input type="text" id="daya" class="form-control" placeholder="{{$pelanggan->daya}}" aria-label="{{$pelanggan->daya}}" value="{{$pelanggan->daya}}">
                            </div>
                            <div class="col-sm-4 mt-4 ">
                                <h4>Biaya tarif aktif</h4>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-secondary text-white">Rp.</span>
                                    <input type="text" class="form-control" value="{{$pelanggan->tarif}}">
                                    <span class="input-group-text bg-secondary text-white"> / KwH</span>
                                </div>
                            </div>
                    
                        </div>
                    </div>
                    @endforeach

                        <table class="table ">
                            <thead>
                                <tr>
                                <th scope="col">Tahun</th>
                                <th scope="col">Bulan penggunaan</th>
                                <th scope="col">Meter Awal</th>
                                <th scope="col">Meter Akhir</th>
                                <th scope="col">Penggunaan</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usages as $usage)
                                    <tr>
                                        <th scope="row" class="align-middle">{{$usage->tahun}}</th>
                                        <td class="align-middle">{{$usage->bulan}}</td>
                                        <td class="align-middle">{{$usage->meter_awal}}</td>
                                        <td class="align-middle">{{$usage->meter_akhir}}</td>
                                        <td class="align-middle">{{$usage->meter_awal - $usage->meter_akhir}}</td>
                                        <td class="align-middle">
                                            <a href="/clientData/{{ $usage->id_penggunaan }}" class="text-white align-middle">
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
</div>
@endsection
