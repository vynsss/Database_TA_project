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

    public function store(Request $request, $id){
        $transaction = DB::insert(
            'INSERT INTO transactions (bill_id, item_id, amount) VALUES (:bill_id, :item_id, :amount)',
            [
                // 'bill_id' => $request->bill_id,
                'bill_id' => $id,
                'item_id' => $request->item_id,
                'amount' => $request->amount
            ]);
        return back();
    }

    public function transaction($bill_id){
        $transactions = DB::select("SELECT * FROM transactions WHERE transactions.bill_id = ? and transactions.bill_id is not null", [$bill_id]);
        return $transactions;
    }
}
