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
        return view('branch', ['branches' => $branch]);
    }

    public function store(Request $request){
        $branch = DB::insert(
            'INSERT INTO branches (name, phone) VALUES (:name, :phone)',
            [
                'name' => $request->name,
                'phone' => $request->phone
            ]
        );

        return back();
    }
}
