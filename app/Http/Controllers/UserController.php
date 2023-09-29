<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UserController extends BaseResponseController
{
    public function find_one(){
        $data = DB::connection('sqlsrv')->selectOne("SELECT * FROM cif WHERE noidentitas = '3201012111860001'");

        $response_data['user'] = $data;

        return json_encode($response_data);
    }
}
