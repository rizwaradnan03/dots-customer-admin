<?php

namespace App\Http\Controllers;

class BaseResponseController extends Controller
{
    public function sendResponse($data)
    {
        if (empty($data[0])) {
            $response = [
                'success' => false,
                'data' => null,
                'message' => "Data Tidak Ditemukan!",
            ];
            return json_encode($response);
        } else {
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data Found',
            ];
            return json_encode($response);
        }
    }
}
