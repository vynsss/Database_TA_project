<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceTax;
use Illuminate\Support\Facades\DB;

class ServiceTaxController extends Controller
{
    public function index(){
        $service_tax = DB::select("SELECT * FROM service_taxes");
        return $service_tax;
    }

    public function store(Request $request){
        $service_tax = ServiceTax::create([
            'service' => $request->service,
            'tax' => $request->tax,
        ]);
        return $service_tax;
    }

}
