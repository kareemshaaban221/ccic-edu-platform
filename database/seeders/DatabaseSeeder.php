<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Request;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\StudentLocation;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
        ]);

        Student::factory(100)->create();
        StudentLocation::factory(150)->create();
        Teacher::factory(10)->create();
        Course::factory(15)->create();
        StudentCourse::factory(200)->create();
        Request::factory(50)->create();
    }
}
