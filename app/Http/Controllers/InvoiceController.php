<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoicesData = DB::table('invoices')
        ->join('clients', 'clients.id', '=', 'invoices.ref_id_pelanggan')
        ->join('usages', 'usages.id_penggunaan', '=', 'invoices.ref_id_penggunaan')
        ->select(
            'invoices.*',
            'clients.*',
            'usages.*',
        )
        ->get();

        foreach($invoicesData as $data){
            $cekTarif = $data->ref_id_electricityRate;
            $biaya = DB::table('electricity_rates')
            ->where('electricity_rates.id_tarif', $cekTarif)
            ->select('electricity_rates.tarif')
            ->first();

            $data->tarif = $biaya->tarif ?? null;

            // dd($invoicesData);
        };

        return view('employee.manageInvoice.invoiceData', ['invoicesData' => $invoicesData]);
    }

    public function detail(Request $request)
    {
        $clients = DB::table('users')
        ->where('users.id', $request->route('id'))
        ->join('clients', 'clients.user_id', '=', 'users.id')
        ->join('electricity_rates', 'clients.ref_id_electricityRate', '=', 'electricity_rates.id_tarif')
        ->select(
            'users.*',
            'clients.*',
            'electricity_rates.*',)
        ->get();

        return view('employee.manageClient.clientsDetailData', ['pelanggans' => $clients]);
    }

    public function checkUsage()
    {
        $invoicesCreated = DB::table('invoices')
        ->where('invoices.tahun', date("Y"))
        // ->where('invoices.bulan', "Maret")
        ->select('ref_id_penggunaan')
        ->get();

        
        $ignoredGenerate = array();

        foreach($invoicesCreated as $idInvoice){
            array_push($ignoredGenerate, $idInvoice->ref_id_penggunaan);
        };


        $invoicedUsage = DB::table('usages')
        ->whereNotIn('usages.id_penggunaan', $ignoredGenerate)
        ->get();

        // dd($invoicesCreated, $ignoredGenerate, $invoicedUsage);
        // exit;

        foreach($invoicedUsage as $generateInvoice){
            DB::table('invoices')->insert([
                        'ref_id_penggunaan'  => $generateInvoice->id_penggunaan,
                        'ref_id_pelanggan'  => $generateInvoice->ref_id_pelanggan,
                        'bulan'  => $generateInvoice->bulan,
                        'tahun'  => $generateInvoice->tahun,
                        'jumlah_meter'  => $generateInvoice->meter_akhir - $generateInvoice->meter_awal,
                        'status'  => 'Tertagih',
                        'created_at'  => now(),
                        'updated_at'  => now(),
                    ]);
        };

        return redirect('/invoiceData');
    }

    public function insert(Request $request)
    {
        
        DB::beginTransaction();
            DB::table('users')->insert([
                    'email'  => $request->input("email"),
                    'created_at'  => now(),
                    'ref_id_role'  => 2,
                ]);

            $newUserID = DB::table('users')
                ->latest() // ambil yang paling baru
                ->first();

            // dd($newUserID->id);

            DB::table('clients')->insert([
                    'user_id'  => $newUserID->id,
                    'nomor_kwh'  => $request->input("nomor_kwh"),
                    'nama_pelanggan'  => $request->input("nama_pelanggan"),
                    'ref_id_electricityRate'  => $request->input("daya"),
                    'created_at'  => $request->input("created_at")." ".date("h:i:s"),
                ]);
        DB::commit();
                

        return redirect('clientData');
    }

    public function destroy(Request $request)
    {
        Invoice::destroy($request->input("delete-target"));
        return redirect('clientData');
    }
}
