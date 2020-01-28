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
        $transactions = DB::select("SELECT * FROM transactions INNER JOIN items ON transactions.item_id = items.id WHERE transactions.bill_id = ? and transactions.bill_id is not null", [$bill_id]);

        // return view('bill_information', ['transactions'=>$transactions]);
    }

    public function add_qty($transaction_id){
        $update = DB::update('update transactions set amount = amount+1 where id = (:id)', [$transaction_id]);

        return back();
    }

    public function min_qty($transaction_id){
        $update = DB::update('update transactions set amount = amount-1 where id = (:id)', [$transaction_id]);

        return back();
    }

    public function remove_qty($transaction_id){
        $update = DB::update('delete from transactions where id = (:id)', [$transaction_id]);

        return back();
    }
}
