<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseResponseController;
use Illuminate\Support\Facades\DB;

class SavingController extends BaseResponseController
{
    public function find_many_by_(){
        $data = DB::connection('sqlsrv')->selectOne("SELECT * FROM tabmaster WHERE norekening = '00102010013795'");

        return json_encode($data);
    }
}
