<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashier;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{
    public function index(){
        $cashier = DB::select("SELECT * FROM cashiers");
        return view('cashier', ['cashiers'=>$cashier]);
    }

    public function store(Request $request){
        $cashier =  DB::insert(
            'INSERT INTO cashiers (name) VALUES (:name)',
            [
                'name' => $request->name
            ]
            );
        return back();
    }
}
