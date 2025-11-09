<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminLoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

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
        return [new Middleware(middleware: 'guest:admin', except: ['logout'])];
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
            flash()->success(__('general.login_success'));
            return redirect()->intended(route('dashboard.index'));
        }
    }
    public function logout()
    {
        $this->authService->logout('admin');
        return redirect()->route('dashboard.get.login');
    }
}
