<?php

namespace App\Http\Controllers;

use App\Models\ElectricityRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ElectricityRateController extends Controller
{
    public function index()
    {
        $tarifs = DB::table('electricity_rates')->get();

        return view('employee.manageTarif.tarifsData', ['tarifs' => $tarifs]);
    }

    public function insert(Request $request)
    {

        $kelasDaya = $request->input("kelas")."/".$request->input("besar_kwh")."KWH";
        
        DB::beginTransaction();
            DB::table('electricity_rates')->insert([
                    'daya'  => $kelasDaya,
                    'tarif'  => $request->input("tarif"),
                ]);

        DB::commit();
                

        return redirect('tarifData');
    }

    public function destroy(Request $request)
    {
        ElectricityRate::destroy($request->input("delete-target"));
        return redirect('tarifData');
    }
}
