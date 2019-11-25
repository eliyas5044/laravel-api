<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\AuthUserResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // find the user with email
        $user = User::where('email', $request->get('email'))->first();
        // if user exist
        if ($user) {
            // check, if user password is correct
            if (Hash::check($request->input('password'), $user->password)) {
                // Get the token
                $token = auth()->login($user);
                return $this->respondWithToken($token);
            }
            return response()->json(['message' => 'Password did not match with our records.'], 401);
        }
        // throw error, email isn't exist in users table
        return response()->json(['message' => 'Sorry, you are not user!'], 401);
    }

    /**
     * Register a new user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            DB::commit();

            $token = auth()->login($user);
            return $this->respondAfterRegister($token);
        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return response()->json([
                'error' => true,
                'success' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return AuthUserResource
     */
    public function me()
    {
        return new AuthUserResource(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
        $user = new AuthUserResource(auth()->user());
        return response()
            ->json([
                'message' => 'login success!',
                'token' => $token,
                'user' => $user,
                'expires' => auth()->factory()->getTTL()
            ]);
    }

    /**
     * Get the token array structure.
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondAfterRegister($token)
    {
        $user = new AuthUserResource(auth()->user());
        return response()
            ->json([
                'message' => 'register success!',
                'token' => $token,
                'user' => $user,
                'expires' => auth()->factory()->getTTL()
            ]);
    }
}
