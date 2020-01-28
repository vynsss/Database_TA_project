<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

class BillController extends Controller
{
    public function index(){
        $bill = DB::select("SELECT * FROM bills WHERE bills.close IS NULL");
        $branch = DB::select("SELECT * FROM branches");
        $servicetax = DB::select("SELECT * FROM service_taxes");
        $server = DB::select("SELECT * FROM servers");
        $cashier = DB::select("SELECT * FROM cashiers");
        // return $bill;
        return view('main', ['bills'=>$bill, 'branches'=>$branch, 'servicesandtaxes'=>$servicetax, 'servers'=>$server, 'cashiers'=>$cashier]);
    }

    public function store(Request $request){
        $bill = DB::insert(
            'INSERT INTO bills (branch_id, date, table_no, service_tax_id, cashier_id, server_id) VALUES (:branch_id, :date, :table_no, :service_tax_id, :cashier_id, :server_id)',
            [
                'branch_id' => $request->branchid,
                'date' => Carbon::now()->toDateString(),
                'table_no' => $request->table_no,
                'service_tax_id' => $request->service_tax_id,
                'cashier_id' => $request->cashier_id,
                'server_id' => $request->server_id
            ]);
        return back();
    }

    public function history(){
        $date = DB::select("SELECT DISTINCT date FROM bills ORDER BY date DESC");
        return view('history', ['dates'=>$date]);
    }

    public function history_date($date){
        $bill = DB::select("SELECT *, bills.id AS bill_id FROM bills INNER JOIN cashiers ON bills.cashier_id = cashiers.id WHERE bills.date = ? AND bills.close IS NOT NULL", [$date]);
        return view('history_per_date', ['bills'=>$bill, 'date'=>$date]);
    }

    public function history_bill($bill_id){
        $bill = DB::select("SELECT * FROM bills INNER JOIN branches ON bills.branch_id = branches.id INNER JOIN servers ON servers.id = bills.server_id INNER JOIN service_taxes ON service_taxes.id = bills.service_tax_id WHERE bills.id = ? limit 1", [$bill_id]);
        $cashier = DB::select("SELECT * FROM cashiers WHERE cashiers.id = ? limit 1", [end($bill)->cashier_id]);
        $items = DB::select("SELECT * FROM items");
        $transactions = DB::select("SELECT * FROM transactions INNER JOIN items ON transactions.item_id = items.id WHERE transactions.bill_id = ? and transactions.bill_id is not null", [$bill_id]);

        return view('bill_information', ['bill'=>$bill, 'items'=>$items, 'transactions'=>$transactions, 'bill_id'=>$bill_id, 'cashier'=>$cashier]);
    }

    public function bill($bill_id){
        $bill = DB::select("SELECT * FROM bills INNER JOIN branches ON bills.branch_id = branches.id INNER JOIN cashiers ON cashiers.id = bills.cashier_id INNER JOIN servers ON servers.id = bills.server_id INNER JOIN service_taxes ON service_taxes.id = bills.service_tax_id WHERE bills.id = ? limit 1", [$bill_id]);
        // // $branch = $bill->branch;
        // $branch = DB::select("SELECT * FROM branches WHERE branches.id = ? limit 1", [end($bill)->branch_id]);
        // // $cashier = $bill->cashier;
        // $cashier = DB::select("SELECT * FROM cashiers WHERE cashiers.id = ? limit 1", [end($bill)->cashier_id]);
        // // $server = $bill->server;
        // $server = DB::select("SELECT * FROM servers WHERE servers.id = ? limit 1", [end($bill)->server_id]);
        // // $transactions = $bill->transactions;
        // $servicetax = DB::select("SELECT * FROM service_taxes");
        $items = DB::select("SELECT * FROM items");
        $transactions = DB::select("SELECT *, transactions.id AS transaction_id, items.id AS item_id FROM transactions INNER JOIN items ON transactions.item_id = items.id WHERE transactions.bill_id = ? and transactions.bill_id is not null", [$bill_id]);

        return view('bill', ['bills'=>$bill, 'items'=>$items, 'transactions'=>$transactions, 'bill_id'=>$bill_id]);
    }

    public function close_bill($bill_id){
        $close = DB::update('update bills set close = CURDATE() where id = ?', [$bill_id]);
        return back();
    }

}
