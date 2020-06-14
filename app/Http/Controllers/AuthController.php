<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'loginWithOTP', 'sendOTP']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $data = request(['user', 'password']);
        $credentials = [
            'email' => $data["user"],
            'password' => $data["password"],
        ];

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /*
     * Login with OTP
     */
    public function loginWithOTP(Request $request)
    {
        $mobile = $request->mobile;
        $otp = $request->otp;

        $credentials = [
            'mobile' => $mobile,
            'password' => $otp,
        ];

        Log::info($credentials);

        if (!$token = auth('api')->attempt($credentials)) {
            $this->clearOTP($mobile);
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $this->clearOTP($mobile);
        return $this->respondWithToken($token);
    }

    private function clearOTP($mobile)
    {
        User::where('mobile', '=', $mobile)->update(['password' => null]);
    }

    /*
     * Generate OTP
     */
    public function sendOTP(Request $request)
    {
        $mobile = $request->mobile;
        if (!$user = User::where('mobile', $mobile)->first()) {
            User::create(["mobile" => $mobile]);
        }
        $otp = rand(1000, 9999);
        $user = User::where('mobile', $request->mobile)->update(['password' => bcrypt($otp)]);
        // TODO: send otp to mobile no using whatsapp api
        return response()->json(['success' => $user, 'otp' => $otp], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
