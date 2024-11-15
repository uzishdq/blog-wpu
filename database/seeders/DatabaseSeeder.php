<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Post::factory(200)->recycle([User::factory(5)->create(), Categories::factory(5)->create()])->create();
    }
}
