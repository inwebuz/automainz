<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OtpController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'phone_number' => ['required', 'regex:/' . Helper::phoneNumberRegex() . '/', 'exists:users,phone_number'],
        ]);

        $user = User::where('phone_number', $data['phone_number'])->firstOrFail();
        $verifyCode = config('app.env') == 'production' ? mt_rand(100000, 999999) : 123456;
        $otp = $user->otps()->create([
            'content' => Hash::make($verifyCode),
        ]);
        // send sms
        Helper::sendSMS('otp' . $otp->id, $user->phone_number, __('main.verify_code_sms_template', ['sitename' => config('app.name'), 'code' => $verifyCode]));

        return response()->json([
            'message' => __('Verification code has been sent'),
        ]);
    }

    public function check(Request $request)
    {
        $data = $this->validate($request, [
            'phone_number' => ['required', 'regex:/' . Helper::phoneNumberRegex() . '/', 'exists:users,phone_number'],
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

        return response()->json([
            'message' => __('OTP is valid'),
        ]);
    }
}

