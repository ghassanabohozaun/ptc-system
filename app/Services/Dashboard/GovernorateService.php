<?php

namespace App\Services\Dashboard;

use App\Models\ShippingGovernorate;
use App\Repositories\Dashboard\GovernorateRepository;

class GovernorateService
{
    protected $governorateRepository;
    //__construct
    public function __construct(GovernorateRepository $governorateRepository)
    {
        $this->governorateRepository = $governorateRepository;
    }

    // get governorate
    public function getGovernorate($id)
    {
        $governorate = $this->governorateRepository->getGovernorate($id);
        if (!$governorate) {
            return false;
        }
        return $governorate;
    }

    // get governoraties
    public function getGovernoraties()
    {
        return $this->governorateRepository->getgovernoraties();
    }

      // get all governorates without relations
    public function getAllGovernoratesWithoutRelations()
    {
        return  $this->governorateRepository->getAllGovernoratesWithoutRelations();
    }

    // get all cities by governorate
    public function getAllCitiesbyGovernorate($id)
    {
        $governorate = self::getGovernorate($id);
        $cities = $this->governorateRepository->getAllCitiesbyGovernorate($governorate);
        return $cities;
    }
    // store governorate
    public function storeGovernorate($request)
    {
        $governorate = $this->governorateRepository->storeGovernorate($request);
        if (!$governorate) {
            return false;
        }
        return $governorate;
    }

    // update governorate
    public function updateGovernorate($request, $id)
    {
        $governorate = self::getGovernorate($id);
        if (!$governorate) {
            return false;
        }
        $governorate = $this->governorateRepository->updateGovernorate($request, $id);
        if (!$governorate) {
            return false;
        }
        return $governorate;
    }

    // change status
    public function changeStatus($id)
    {
        $governorate = self::getGovernorate($id);
        if (!$governorate) {
            return false;
        }
        $governorate = $this->governorateRepository->changeStatus($governorate);
        if (!$governorate) {
            return false;
        }
        return $governorate;
    }

    // destory governorate
    public function destroyGovernorate($id)
    {
        $governorate = self::getGovernorate($id);
        if ($governorate->cities->count() > 0 || !$governorate) {
            return false;
        }

        $governorate = $this->governorateRepository->destroyGovernorate($governorate);
        if (!$governorate) {
            return false;
        }
        return $governorate;
    }



}
