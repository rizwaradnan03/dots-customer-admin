<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseResponseController;
use Illuminate\Support\Facades\DB;

class SavingController extends BaseResponseController
{
    public function findAllSaving(){
        $data = DB::connection('sqlsrv')->select("SELECT * FROM tabmaster");

        return json_encode($data);
    }
}
