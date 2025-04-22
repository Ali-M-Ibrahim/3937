<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    // link of library
//https://github.com/fzaninotto/Faker?tab=readme-ov-file#fakerprovideren_usaddress


    protected $model=User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->firstName(),
            'email'=>fake()->safeEmail(),
            'address'=>fake()->address(),
            'password'=>Hash::make("123"),
            'is_admin'=>fake()->randomElement([true,false])
        ];
    }
}
