<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    public function index(){
        $server = DB::select("SELECT * FROM servers");
        return $server;
    }

    public function store(Request $request){
        $server = Server::create([
            'name' => $request->name,
        ]);
        return $server;
    }
}
