<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\ContactSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ContactSeeder::class,
        ]);
    }
}
