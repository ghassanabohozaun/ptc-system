<?php

namespace App\Repositories\Dashboard;

use App\Models\City;

class CityRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get city
    public function getCity($id)
    {
        return City::find($id);
    }

    // get cities
    public function getCities()
    {
        $cities = City::when(!empty(request()->keyword), function ($query) {
            $query->where('name', 'like', '%' . request()->keyword . '%');
        })
            ->orderByDesc('id')
            ->select('id', 'name', 'governorate_id')
            ->paginate(10);
        return $cities;
    }


    // get cities without Relations
    public function getAllCitiesWithoutRelation()
    {
        return City::get();
    }


    // store city
    public function storeCity($request)
    {
        $city = City::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'governorate_id' => $request->governorate_id,
        ]);
        return $city;
    }

    // update city
    public function updateCity($request, $id)
    {
        $city = self::getCity($id);
        $city = $city->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'governorate_id' => $request->governorate_id,
        ]);

        return $city;
    }

    // destroy city
    public function destroyCity($city)
    {
        return $city->forceDelete();
    }
    // change status
    public function changeStatus($city, $status)
    {
        $city = $city->update([
            'status' => $status,
        ]);
        return $city;
    }
}
