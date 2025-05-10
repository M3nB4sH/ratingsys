<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            RoleSeeder::class,
            UserAdminSeeder::class,
            EducationalExperienceSeeder::class,
            LevelSeeder::class,
            PeriodSeeder::class,
            WeekSeeder::class,
            EstimateSeeder::class,
            CompetenceSeeder::class,
            FieldSeeder::class,
            ActivitySeeder::class,
            CompetenceFieldSeeder::class,
            CompetenceActivitySeeder::class,
            FormSeeder::class,


        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
