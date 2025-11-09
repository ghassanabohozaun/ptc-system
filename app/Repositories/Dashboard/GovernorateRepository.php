<?php

namespace App\Repositories\Dashboard;
use App\Models\Governorate;
use App\Models\ShippingGovernorate;

class GovernorateRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get governorate
    public function getGovernorate($id)
    {
        return Governorate::find($id);
    }

    // get governorates
    public function getgovernoraties()
    {
        $governorates = Governorate::withCount(['cities'])
            ->when(!empty(request()->keyword), function ($q) {
                $q->where('name', 'like', '%' . request()->keyword . '%');
            })
            ->orderByDesc('id')
            ->paginate(10);

        return $governorates;
    }

    // get all governorates without relations
    public function getAllGovernoratesWithoutRelations()
    {
        return Governorate::get();
    }

    // get all cities by governorate
    public function getAllCitiesbyGovernorate($governorate)
    {
        $cities = $governorate->cities()->get();
        return $cities;
    }

    // store governorate
    public function storeGovernorate($request)
    {
        $governorate = Governorate::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
        ]);

        return $governorate;
    }

    // update governorate
    public function updateGovernorate($request, $id)
    {
        $governorate = self::getGovernorate($id);
        $governorateUpdate = $governorate->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
        ]);

        return $governorateUpdate;
    }

    // change status
    public function changeStatus($governorate)
    {
        $governorate = $governorate->update([
            'status' => $governorate->status == 'on' ? 0 : 1,
        ]);
        return $governorate;
    }
    // destory governorate
    public function destroyGovernorate($governorate)
    {
        $governorate = $governorate->forceDelete();
        return $governorate;
    }
}
