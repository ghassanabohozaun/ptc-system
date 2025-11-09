<?php

namespace App\Http\Controllers\Children\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Children\LoginRequest;
use App\Services\Children\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Services\Dashboard\ChildService;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Container\Attributes\Auth;

class AuthController extends Controller implements HasMiddleware
{
    protected $childService, $governorateService, $cityService, $authService;
    // __construct
    public function __construct(ChildService $childService, GovernorateService $governorateService, CityService $cityService, AuthService $authService)
    {
        $this->childService = $childService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
        $this->authService = $authService;
    }

    // middleware
    public static function middleware()
    {
        return [new Middleware(middleware: 'guest:child', except: ['logout'])];
    }

    //get login
    public function getLogin()
    {
        $title = __('auth.login');
        return view('children.auth.login', compact('title'));
    }

    // post login
    public function postLogin(LoginRequest $request)
    {
        $credinatioals = $request->only(['personal_id', 'password']);
        $remmber = $request->has('remmber') ? true : false;

        $checkLogin = $this->authService->login($credinatioals, $remmber, 'child');

        if (!$checkLogin) {
            flash()->error(__('general.login_faild'));
            return redirect()->back();
        } else {
            $ChildID = child()->user()->id;

            $child = $this->childService->getChildWithRelations($ChildID);
            if (!$child) {
                flash()->error(__('general.no_record_found'));
                return redirect()->back();
            }
            flash()->success(__('general.login_success'));
            return redirect()->route('child.children.show',child()->user()->id);
        }
    }

    // logout
    public function logout()
    {
        $this->authService->logout('child');
        return redirect()->route('child.get.login');
    }
}
