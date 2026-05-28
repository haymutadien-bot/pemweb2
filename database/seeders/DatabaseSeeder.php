<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
 public function run(): void
{
    $this->call([
        UserSeeder::class,
        DivisiSeeder::class,
        JabatanSeeder::class,
        JenisTrainingSeeder::class,
        PegawaiSeeder::class, // Taruh di bawah karena butuh data user, divisi, dan jabatan
    ]);
}

}
