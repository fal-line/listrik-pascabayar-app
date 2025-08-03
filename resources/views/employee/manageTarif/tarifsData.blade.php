@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-5">

                    <div class="card-header h4 py-3"><strong>Data Tarif</strong></div>
                        <!-- <a href="/tarifData/baru" class="text-white align-middle">
                            <button type="button" class="btn btn-outline-primary ">
                                Buat Tarif Baru
                            </button>
                        </a> -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Buat tarif baru
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data tarif baru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               
<form method="POST" action="/tarifData/baru">
      @csrf
                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-4 mt-4 ">
                                <h4>Kelas</h4>
                                <input type="text" name="kelas" class="form-control" aria-label="kelas" >
                            </div>

                            <div class="col-sm-8 mt-4 ">
                                <h4>Besar KwH</h4>
                                <input type="text" name="besar_kwh" class="form-control" aria-label="besar_kwh" >
                            </div>

                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="row">

                            <div class="col-sm-12 mt-4 ">
                                <h4>Biaya per KwH</h4>
                                <input type="text" name="tarif" class="form-control" aria-label="tarif" >
                            </div>

                        </div>
                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-success">Tambah tarif baru</button>
                            </div>
                            </div>
</form>
                        </div>
                        </div>

            </div>

            
                        <div class="row">
                            @foreach($tarifs as $tarif)

                                <div class="card me-4 mt-4" style="width: 16rem;">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2">Kelas</h6>
                                        <h5 class="card-title">{{$tarif->daya}}</h5>
                                        <h6 class="card-subtitle mt-3 text-muted">Biaya per-KwH</h6>
                                        <p class="card-text">Rp {{ number_format( $tarif->tarif, 0, '','.') }},-</p>
                                        <form method="POST" action="/tarifData/delete/{{$tarif->id_tarif}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="delete-target" value="{{$tarif->id_tarif}}">
                                            <button type="submit" class="btn btn-outline-danger">
                                                Hapus tarif
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    
                </div>
        </div>
    </div>
</div>

<script>
                $(document).ready(function(){
                /* Dengan Rupiah */
                var dengan_rupiah = document.getElementById('dengan-rupiah');

                dengan_rupiah.addEventListener('keyup', function(e)
                {
                    dengan_rupiah.value = formatRupiah(this.value, '');
                });

                /* Fungsi */
                function formatRupiah(angka, prefix)
                {
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split    = number_string.split(','),
                        sisa     = split[0].length % 3,
                        rupiah     = split[0].substr(0, sisa),
                        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                        
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    
                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                }

            });
            </script>
@endsection
