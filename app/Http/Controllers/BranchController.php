<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    public function index(){
        // $branch = Branch::all();
        $branch = DB::select("SELECT * FROM branches");
        return $branch;
        // return view('welcome', ['branches' => $branch]);
    }

    public function store(Request $request){
        DB::enableQueryLog();
        $branch = Branch::create([
            'name' => $request->name,
            'phone' => $request->phone
        ]);
        $query = DB::getQueryLog();

        return $query;
    }
}
