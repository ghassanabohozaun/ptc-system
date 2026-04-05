<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminLoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller implements HasMiddleware
{
    protected $authService;
    // __construct  dependency injection
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public static function middleware()
    {
        return [new Middleware(middleware: 'guest:admin', except: ['logout', 'lockScreen', 'unlock'])];
    }

    // get login function
    public function getLogin()
    {
        return view('dashboard.auth.login');
    }

    // post login function
    public function postLogin(AdminLoginRequest $request)
    {
        $credinatioals = $request->only(['email', 'password']);
        $remmber = $request->has('remmber') ? true : false;

        $checkLogin = $this->authService->login($credinatioals, $remmber, 'admin');
        if (!$checkLogin) {
            flash()->error(__('general.login_faild'));
            return redirect()->back();
        } else {
            session(['is_locked' => false]); // Reset lock on login
            flash()->success(__('general.login_success'));
            return redirect()->intended(route('dashboard.index'));
        }
    }
    public function logout()
    {
        $this->authService->logout('admin');
        session(['is_locked' => false]);
        return redirect()->route('dashboard.get.login');
    }

    // lock screen function
    public function lockScreen()
    {
        session()->put('is_locked', true);
        session()->save();
        return view('dashboard.auth.lock-screen');
    }

    // unlock screen function
    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        if (Hash::check($request->password, Auth::guard('admin')->user()->password)) {
            session()->forget('is_locked');
            session()->save();
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'redirect' => route('dashboard.index')
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => __('auth.failed')
        ], 422);
    }
}
