<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'), // Password for testing
            'is_admin' => true, // Ensure this user is an admin
        ];
    }
}
