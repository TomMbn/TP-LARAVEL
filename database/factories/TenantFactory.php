<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => random_int(1, 2),
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'phone_number' => $this->faker->phoneNumber,
            'bank_account' => $this->faker->bankAccountNumber,
        ];
    }
}