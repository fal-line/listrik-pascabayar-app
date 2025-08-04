@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            
            <div class="mb-5">
                        <div class="card-header h4 py-3"><strong>Data Tagihan</strong></div>
                        <a href="/paymentsData/create" class="text-white align-middle">
                            <button type="button" class="btn btn-outline-primary ">
                                Buat tagihan
                            </button>
                        </a>
            
            </div>
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">UID Pembayaran</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Bulan Pembayaran</th>
                    <th scope="col">Bulan Tagihan</th>
                    <th scope="col">Total Tagihan</th>
                    <th scope="col">Total Dibayarkan</th>
                    <th scope="col">Nomor Tagihan</th>
                    <th scope="col">Nomor KwH Pelanggan</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentsData as $payment)
                        <tr>
                            <th scope="row" class="align-middle">{{$payment->id_bayar}}</th>
                            <td class="align-middle">{{$payment->tahun}}</td>
                            <td class="align-middle">{{$payment->bulan_bayar}}</td>
                            <td class="align-middle">{{$payment->bulan}}</td>
                            <td class="align-middle">{{$payment->total_bayara}}</td>
                            <td class="align-middle">{{$payment->total_bayara}}</td>
                            <td class="align-middle">{{$payment->id_tagihan}}</td>
                            <td class="align-middle">{{$payment->nomor_kwh}}</td>
                            <td class="align-middle">{{$payment->nama_karyawan}}</td>
                            <td class="align-middle">
                                <a href="/clientData/{{ $payment->id_tagihan }}" class="text-white align-middle">
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
