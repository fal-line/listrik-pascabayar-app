@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            
            <div class="mt-4">
                <a href="/clientData">Kembali ke data client</a>
                        <div class="card-header h4 py-3"><strong>Isi Data Pelanggan Baru</strong></div>
                    <hr  class="mt-2">

<form method="POST" action="/clientData/baru">
      @csrf
                    <div class="mt-2">
                        <div class="row">


                            <div class="col-sm-6 mt-4 ">
                                <h4>Email</h4>
                                <input type="email" class="form-control" name="email" aria-label="email">
                            </div>

                            <div class="col-sm-6 mt-4 ">
                                <h4>Password</h4>
                                <input type="text" class="form-control" name="password" aria-label="password">
                                <div id="passwordHelp" class="form-text">Gunakan NIK pelanggan sebagai password bawaan.</div>
  
                            </div>

                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-4 mt-4 ">
                                <h4>Nama Pelanggan</h4>
                                <input type="text" name="nama_pelanggan" class="form-control" aria-label="nama_pelanggan" >
                            </div>

                            <div class="col-sm-4 mt-4 ">
                                <h4>Nomor KwH</h4>
                                <input type="text" name="nomor_kwh" class="form-control" aria-label="nomor_kwh" >
                            </div>

                            <div class="col-sm-4 mt-4 ">
                                <h4>Kelas tarif listrik</h4>
                                <select class="form-select" name="daya" name="daya">
                                    <option selected>Pilih Daya Listrik</option>
                                    @foreach ($dayas as $daya)
                                    <option value="{{$daya->id_tarif}}">{{$daya->daya}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-6 mt-4 ">
                                <h4>Tanggal Daftar</h4>
                                <input type="date" class="form-control" name="created_at" aria-label="created_at">
                            </div>

                            <div class="col-sm-6 mt-4 ">
                                <h4>Domisili Pelanggan</h4>
                                <!-- <input type="text" class="form-control bg-secondary text-white" placeholder="Jauh, Pake Helm" aria-label="Jauh, Pake Helm" value="Jauh, Pake Helm" disabled> -->
                                <select class="form-select" name="domisili">
                                    <option selected>Pilih Domisili</option>
                                    <option value="Bekasi">Bekasi</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Depok">Depok</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    
                        <div class="d-flex flex-row py-4" >
                            <button type="submit" class="btn btn-outline-success">Tambah data pelanggan</button>
                        </div>

</form>
                    
            </div>
        </div>
    </div>
</div>
@endsection
