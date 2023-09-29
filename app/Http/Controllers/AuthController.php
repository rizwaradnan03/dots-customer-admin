<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends BaseResponseController
{
    public function register_user(Request $request)
    {
        $identityNumber = $request->identityNumber;
        $motherMaidenName = $request->motherMaidenName;
        $fullName = $request->fullName;

        $find_available_user_by_mother_name = DB::connection('sqlsrv')->selectOne("SELECT * FROM cif WHERE nmibukandung = '$motherMaidenName'");
        $find_available_user_by_identity_number = DB::connection('sqlsrv')->selectOne("SELECT * FROM cif WHERE noidentitas = '$identityNumber'");
        $find_available_user_by_full_name = DB::connection('sqlsrv')->selectOne("SELECT noidentitas, namalengkap, namaidentitas, nmibukandung FROM cif WHERE namalengkap = '$fullName'");

        $response_data = [];

        if (empty($find_available_user_by_mother_name)) {
            $response_data['message']['mothername'] = 'Mother name not found';
        }

        if (empty($find_available_user_by_identity_number)) {
            $response_data['message']['identitynumber'] = 'Identity number not found';
        }

        if (empty($find_available_user_by_full_name)) {
            $response_data['message']['fullname'] = 'Full name not found';
        }

        if (!empty($response_data)) {
            return json_encode($response_data);
        }

        $response_data['user'] = $find_available_user_by_full_name;

        return json_encode($response_data);
    }
}
