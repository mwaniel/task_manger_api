<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        factory(Task::class, 10)->create(); // Create 10 tasks
    }
}
