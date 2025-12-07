<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['male', 'female'];
        $material_status = ['single','married','divorced','widowed'];
        $currency = ['ILS', 'USD', 'GBP'];

        return [
            'first_name' => fake()->firstName,
            'father_name' => fake()->sentence(1),
            'grand_father_name' => fake()->sentence(1),
            'family_name' => fake()->sentence(1),
            'password'=>'',
            'personal_id' => fake()->randomNumber( 9),
            'gender' => fake()->randomElement($gender),
            'birthday' => fake()->date,
            'marital_status' => fake()->randomElement($material_status),
            'mobile_no' => fake()->phoneNumber,
            'alternative_mobile_no' => fake()->phoneNumber,
            'email' => fake()->email,
            'governoate_id' => Governorate::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'address_details' => fake()->sentence(10),
            'bank_name' => fake()->sentence(3),
            'iban' => fake()->randomNumber( 5),
            'banck_account' => fake()->randomNumber( 5),
            'currency' => fake()->randomElement($currency),
            'photo' => '',
        ];
    }
}
