<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashier;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{
    public function index(){
        $cashier = DB::select("SELECT * FROM cashiers");
        return $cashier;
    }

    public function store(Request $request){
        $cashier = Cashier::create([
            'name' => $request->name,
        ]);
        return $cashier;
    }
}
