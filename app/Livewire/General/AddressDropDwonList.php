<?php

namespace App\Livewire\General;

use App\Services\Dashboard\CityService;
use App\Services\Dashboard\GovernorateService;
use Livewire\Component;

class AddressDropDwonList extends Component
{
    public $governorateId, $cityId, $governorates, $cities;
    protected GovernorateService $governorateService;
    protected CityService $cityService;

    public function boot( GovernorateService $governorateService, CityService $cityService)
    {
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }

    public function mount()
    {
       // $this->countries = $this->countryService->getAllCountriesWithoutRelations();
        //$this->countryId ?? ($this->governorates = []);
        $this->governorateId ?? ($this->cities = []);
    }

    // public function changeCountry($id)
    // {
    //     if ($id != 0) {
    //         $this->cities = [];
    //         $this->governorates = [];
    //         $this->governorateId = 0;
    //         $this->governorates = $this->countryService->getAllGovernoratiesByCountry($id);
    //     } else {
    //         $this->cities = [];
    //         $this->governorates = [];
    //         $this->governorateId = 0;
    //     }
    // }

    public function changeGovernorate($id)
    {
        if ($id != 0) {
            $this->cities = [];
            $this->cityId = 0;
            $this->cities = $this->governorateService->getAllCitiesbyGovernorate($id);
        } else {
            $this->cityId = 0;
            $this->cities = [];
        }
    }
    public function render()
    {
        return view('livewire.general.address-drop-dwon-list');
    }
}
