<?php

namespace Database\Factories;

use App\Models\Phonebook;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PhonebookFactory extends Factory
{
    protected $model = Phonebook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'                    => $this->faker->name(),
            'zip_code'                => $this->faker->regexify('[1-9]{1}[0-9]{3}'),
            'city'                    => $this->faker->city(),
            'street'                  => $this->faker->streetName(),
            'address_details'         => $this->faker->address(),
            'mailing_zip_code'        => $this->faker->regexify('[1-9]{1}[0-9]{3}'),
            'mailing_city'            => $this->faker->city(),
            'mailing_street'          => $this->faker->streetName(),
            'mailing_address_details' => $this->faker->address(),
            'created_at'              => Carbon::now(),
            'updated_at'              => Carbon::now(),
        ];
    }
}
