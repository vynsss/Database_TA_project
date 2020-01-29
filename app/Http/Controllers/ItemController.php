<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index(){
        $item = DB::select("SELECT * FROM items"); //table doesnt exist?
        // return $item;
        return view('menu', ['items'=>$item]);
    }

    public function store(Request $request){
        $item = DB::insert(
            'INSERT INTO items (name, price) VALUES (:name, :price)',
            [
                'name' => $request->name,
                'price' => $request->price
            ]
        );
        return back();
    }
}
