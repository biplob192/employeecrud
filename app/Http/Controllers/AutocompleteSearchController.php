<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class AutocompleteSearchController extends Controller
{
    public function index()
    {
      return view('autocompleteSearch');
    }

    public function query(Request $request)
    {
      $input = $request->all();

        $data = Employee::select("name")
                  ->where("name","LIKE","%{$input['query']}%")
                  ->get();
   
        return response()->json($data);
    }
}
