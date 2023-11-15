<?php

namespace Database\Factories;

use App\Models\Phonebook;
use App\Models\PhonebookEmail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PhonebookEmailFactory extends Factory
{
    protected $model = PhonebookEmail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'email'      => $this->faker->unique()->safeEmail(),
            'phonebook_id' => \App\Models\Phonebook::inRandomOrder()->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
