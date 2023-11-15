<?php

namespace Database\Factories;

use App\Models\Phonebook;
use App\Models\PhonebookNumber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PhonebookNumberFactory extends Factory
{
    protected $model = PhonebookNumber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'phonebook_id' => Phonebook::inRandomOrder()->first()->id,
            'phone_number' => $this->faker->unique()->regexify('0036[9]{2}[0-9]{6}'),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];
    }
}
