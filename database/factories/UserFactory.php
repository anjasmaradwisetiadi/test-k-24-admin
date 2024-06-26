<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=> Str::uuid(),
            'role_id'=>strval($this->faker->numberBetween(1,2)),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('memberdefault'),
            'no_hp'=>$this->faker->phoneNumber(),
            'date_birth'=>$this->faker->dateTimeBetween('-17 year', '+120 year'),
            'gender'=>$this->faker->randomElement(['male','female']),
            'no_ktp'=> $this->faker->nik(),
            'photo'=>env('APP_URL').'storage/photo-users/shuraiq-omen.jpg',
            'position'=>$this->faker->randomElement(['administator','member']),
            'status'=>$this->faker->boolean(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
