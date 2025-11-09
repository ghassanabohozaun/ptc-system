<?php

namespace App\Http\Controllers\Children;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\ChildService;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    protected $childService, $governorateService, $cityService, $authService;
    // __construct
    public function __construct(ChildService $childService, GovernorateService $governorateService, CityService $cityService)
    {
        $this->childService = $childService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }

    // welcome
    public function welcome()
    {
        $title = __('children.welcome');
        return view('children.welcome', compact('title'));
    }

    // index
    public function index()
    {
        //
    }

    // show
    public function create()
    {
        //
    }

    // store
    public function store(Request $request)
    {
        //
    }

    // show
    public function show(string $id)
    {
        $ChildID = $id;
        $child = $this->childService->getChildWithRelations($ChildID);
        if (!$child) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $title = __('children.show_child');
        return view('children.show', compact('title', 'child','ChildID'));
    }

    // edit
    public function edit(string $id)
    {
        $ChildID = $id;
        $child = $this->childService->getChildWithRelations($ChildID);
        if (!$child) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $title = __('children.update_child');
        $governoates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        return view('children.edit', compact('title', 'ChildID', 'child', 'governoates', 'cities'));
    }

    // update
    public function update(Request $request, string $id)
    {
        //
    }

    //destroy
    public function destroy(string $id)
    {
        //
    }
}
