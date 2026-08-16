<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'course_name' => 'Laravel'
        ]);

        Course::create([
            'course_name' => 'PHP'
        ]);

        Course::create([
            'course_name' => 'Python'
        ]);

        Course::create([
            'course_name' => 'Artificial Intelligence'
        ]);
    }
}