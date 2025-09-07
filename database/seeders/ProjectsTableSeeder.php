<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         for ($i = 1; $i <= 10; $i++) {
            DB::table('projects')->insert([
                'title' => 'Project ' . $i,
                'description' => 'Description for project ' . $i,
                'user_id' =>1,
                'status' => collect(['new', 'in_progress', 'completed'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
