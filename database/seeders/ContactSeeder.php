<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            Contact::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail, // Correos electrónicos únicos
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}


