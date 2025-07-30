<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = DB::table('users')
        ->join('clients', 'clients.user_id', '=', 'users.id')
        ->join('electricity_rates', 'clients.ref_id_electricityRate', '=', 'electricity_rates.id_tarif')
        ->where('users.ref_id_role', 2)
        ->select(
            'users.*',
            'clients.*',
            'electricity_rates.*',
        )
        ->get();

        return view('employee.manageClient.clientsData', ['pelanggans' => $clients]);
    }
}
