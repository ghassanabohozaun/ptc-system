<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Services\Dashboard\ChildService;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $childService, $governorateService, $cityService;
    public function __construct(GovernorateService $governorateService, CityService $cityService)
    {
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }

    public function index()
    {
        $title = __('dashboard.dashboard');

        return view('dashboard.index', compact( 'title'));
    }

    // addresses
    public function addresses()
    {
        $governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        return view('dashboard.address', compact('governorates', 'cities'));
    }



    // // child registration chart function
    // public function maleChildRegistrationChart()
    // {
    //     $childRegistration = Child::where('gender', 'male')->selectRaw('COUNT(*) as count, YEAR(created_at) as year, MONTH(created_at) as month')->groupBy('year', 'month')->orderBy('year')->orderBy('month')->get();

    //     $childCount = [];
    //     $months = [];
    //     foreach ($childRegistration as $key => $item) {
    //         $childCount[$key] = $item['count'];
    //         $months[$key] = $item['month'];
    //     }

    //     $maleRegistrationData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    //     foreach ($months as $index => $month) {
    //         $maleRegistrationData[$month - 1] = $childCount[$index];
    //     }
    //     return $maleRegistrationData;
    // }


    //   // child registration chart function
    // public function femaleChildRegistrationChart()
    // {
    //     $childRegistration = Child::where('gender', 'female')->selectRaw('COUNT(*) as count, YEAR(created_at) as year, MONTH(created_at) as month')->groupBy('year', 'month')->orderBy('year')->orderBy('month')->get();

    //     $childCount = [];
    //     $months = [];
    //     foreach ($childRegistration as $key => $item) {
    //         $childCount[$key] = $item['count'];
    //         $months[$key] = $item['month'];
    //     }

    //     $femaleRegistrationData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    //     foreach ($months as $index => $month) {
    //         $femaleRegistrationData[$month - 1] = $childCount[$index];
    //     }
    //     return $femaleRegistrationData;
    // }




}
