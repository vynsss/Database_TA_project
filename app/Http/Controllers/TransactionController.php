<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        $transaction = DB::select("SELECT * FROM transactions");
        return $transaction;
    }

    public function store(Request $request){
        $transaction = DB::insert(
            'INSERT INTO transactions (bill_id, item_id, amount) VALUES (:bill_id, :item_id, :amount)',
            [
                'bill_id' => $request->bill_id,
                'item_id' => $request->item_id,
                'amount' => $request->amount
            ]);
        return $transaction;
    }

    public function transaction($bill_id){
        $transactions = DB::select("SELECT * FROM transactions WHERE transactions.bill_id = ? and transactions.bill_id is not null", [$bill_id]);
        return $transactions;
    }
}
