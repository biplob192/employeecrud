<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function dbConn(){

    try{
    DB::connection()->getPdo();
    echo "DB connected successfully!!";
} catch(\Exception $e){
    die("Could not connect to the database, please check your configuration. Error: " . $e);
}

   }
}


