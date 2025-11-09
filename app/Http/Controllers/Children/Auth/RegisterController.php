<?php

namespace App\Http\Controllers\Children\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Dashboard\ChildService;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\GovernorateService;

class RegisterController extends Controller
{
    protected $childService, $governorateService, $cityService;
    // __construct
    public function __construct(ChildService $childService, GovernorateService $governorateService, CityService $cityService)
    {
        $this->childService = $childService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }

    //index
    public function index()
    {
        $title = __('auth.register');
        $governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        return view('children.register', compact('title', 'governorates', 'cities'));
    }

}
