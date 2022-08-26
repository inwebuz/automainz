<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'phone_number' => ['required', 'regex:/' . Helper::phoneNumberRegex() . '/', 'exists:users,phone_number'],
            'new_password' => 'required|min:8',
            'otp' => ['required'],
        ]);

        $user = User::where('phone_number', $data['phone_number'])->firstOrFail();

        $checkOTP = Helper::checkOTP($user, $data['otp']);
        if (!$checkOTP['success']) {
            return response()->json([
                'message' => __('main.error'),
                'errors' => [
                    'otp' => [
                        $checkOTP['error'],
                    ],
                ],
            ], 422);
        }

        // update password
        $user->password = Hash::make($data['new_password']);
        $user->save();

        // delete user otps
        $user->otps()->delete();

        return response()->json([
            'message' => __('Password has been updated'),
        ]);
    }
}

