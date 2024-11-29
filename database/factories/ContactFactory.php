<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),              // Genera un nombre aleatorio
            'email' => $this->faker->unique()->safeEmail(),  // Genera un correo electrónico único
            'phone' => $this->faker->phoneNumber(),      // Genera un teléfono aleatorio
        ];
    }
}
