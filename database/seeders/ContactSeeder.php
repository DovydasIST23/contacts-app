<?php

namespace Database\seeders;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::factory()->count(10)->create();
    }
}
