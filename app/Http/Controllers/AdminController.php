<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function login(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'code' => 422,
                    'message' => $validator->errors(),
                    'status' => 'error'
                ],
                'data' => null
            ], 422);
        }

        $data = Admin::where('email', $req->email)->first();
        if (!$data) {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'message' => 'error email or password wrong',
                    'status' => 'error'
                ],
                'data' => null
            ], 400);
        }

        if (!Hash::check($req->password, $data->password)) {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'message' => 'error email or password wrong',
                    'status' => 'error'
                ],
                'data' => null
            ], 400);
        }

        // Assuming you've authenticated the admin
        // $admin = Auth::guard('admin')->user();

        // Create a token for the admin
        $admin = $data;
        $token = $admin->createToken('admin-token')->plainTextToken;

        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'success',
                'status' => 'success'
            ],
            'data' => [$data, 'token' => $token]
        ]);
    }
}
