<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    public function index(){
        $server = DB::select("SELECT * FROM servers");
        return view('server', ['servers'=>$server]);
    }

    public function store(Request $request){
        $server = DB::insert(
            'INSERT INTO server (name) VALUES (:name)',
            [
                'name' => $request->name
            ]);
        return back();
    }
}
