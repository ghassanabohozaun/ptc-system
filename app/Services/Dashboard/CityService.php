<?php

namespace App\Services\Dashboard;

use App\Models\City;
use App\Repositories\Dashboard\CityRepository;

class CityService
{
    protected $cityRepository;
    //__construct
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }
    // get city
    public function getCity($id)
    {
        $city = $this->cityRepository->getCity($id);
        if (!$city) {
            return false;
        }
        return $city;
    }

    // get cities without Relations
    public function getAllCitiesWithoutRelation()
    {
        return $this->cityRepository->getAllCitiesWithoutRelation();
    }

    // get cities
    public function getCities()
    {
        return $this->cityRepository->getCities();
    }

    // store city
    public function storeCity($request)
    {
        $city = $this->cityRepository->storeCity($request);
        if (!$city) {
            return false;
        }
        return $city;
    }

    // destroy city
    public function destroyCity($id)
    {
        $city = self::getCity($id);

        if (!$city) {
            return false;
        }

        $city = $this->cityRepository->destroyCity($city);
        if (!$city) {
            return false;
        }
        return $city;
    }

    // update city
    public function updateCity($request, $id)
    {
        $city = self::getCity($id);
        if (!$city) {
            return false;
        }
        $city = $this->cityRepository->updateCity($request, $id);
        if (!$city) {
            return false;
        }
        return $city;
    }
}
