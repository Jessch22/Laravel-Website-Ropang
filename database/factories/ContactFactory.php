<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'subject' => $this->faker->sentence,
            'message' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'resolved']),
        ];
    }
}
