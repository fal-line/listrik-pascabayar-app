<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        // dd($clients);

        return view('employee.manageClient.clientsData', ['pelanggans' => $clients]);
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

        
        $usages =  DB::table('usages')
        ->where('usages.ref_id_pelanggan', $request->route('id'))
        ->get();

        $cekEmpty = count($usages);
        
// if (!$result->isEmpty()) { }
        

        return view('employee.manageClient.clientsDetailData', ['pelanggans' => $clients, 'usages' => $usages])->with('cekEmpty', $cekEmpty);
    }

    public function create()
    {
        
        $dayas = DB::table('electricity_rates')
        ->get();

        return view('employee.manageClient.clientsNewData', ['dayas' => $dayas]);
    }

    public function insert(Request $request)
    {
        
        DB::beginTransaction();
            DB::table('users')->insert([
                    'email'  => $request->input("email"),
                    'password'  => Hash::make($request->input("password")),
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
        Client::destroy($request->input("delete-target"));
        return redirect('clientData');
    }
}
