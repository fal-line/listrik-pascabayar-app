<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $paymentsData = DB::table('payments')
        ->join('invoices', 'invoices.id_tagihan', '=', 'payments.ref_id_tagihan')
        ->join('employees', 'employees.id', '=', 'payments.ref_admin')
        ->select(
            'payments.*',
            'invoices.*',
            'employees.*',
        )
        ->get();

        

        foreach($paymentsData as $data){
            $cekUser = $data->ref_id_pelanggan;
            $client = DB::table('clients')
            ->where('clients.id', $cekUser)
            ->select('clients.nomor_kwh')
            ->first();

            $data->nomor_kwh = $client->nomor_kwh ?? null;

            // dd($paymentsData, $data, $cekUser);
        };
        
        // dd($paymentsData);

        return view('employee.managePayment.paymentsData', ['paymentsData' => $paymentsData]);
    }
}
