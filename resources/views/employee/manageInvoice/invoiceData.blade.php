@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            
            <div class="mb-5">
                        <div class="card-header h4 py-3"><strong>Data Tagihan</strong></div>
                        <a href="/invoiceData/generate" class="text-white align-middle">
                            <button type="button" class="btn btn-outline-primary ">
                                Generate tagihan terbaru
                            </button>
                        </a>
            
            </div>
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">ID Pelanggan</th>
                    <th scope="col">Nomor KwH</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Bulan Penggunaan</th>
                    <th scope="col">Jumlah KwH</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoicesData as $invoice)
                        <tr>
                            <th scope="row" class="align-middle">{{$invoice->ref_id_pelanggan}}</th>
                            <td class="align-middle">{{$invoice->nomor_kwh}}</td>
                            <td class="align-middle">{{$invoice->tahun}}</td>
                            <td class="align-middle">{{$invoice->bulan}}</td>
                            <td class="align-middle">{{$invoice->meter_akhir - $invoice->meter_awal}} KwH</td>
                            <td class="align-middle">Rp {{ number_format( ($invoice->meter_akhir - $invoice->meter_awal) * $invoice->tarif, 0, '','.') }},-</td>
                            <td class="align-middle">{{$invoice->status}}</td>
                            <td class="align-middle">
                                <a href="/clientData/{{ $invoice->id_tagihan }}" class="text-white align-middle">
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
