<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);



        Post::factory(20)->recycle([
            $testUser, 
            User::factory(5)->create(),  
            Category::factory()->create([
                'name' => 'Web Programming',
                'slug' => Str::slug('Web Programming'),
            ]),
            Category::factory()->create([
                'name' => 'Random bgt',
                'slug' => Str::slug('Random bgt'),
            ]),
            Category::factory()->create([
                'name' => 'Gaming',
                'slug' => Str::slug('Gaming'),
            ]),
            Category::factory()->create([
                'name' => 'Sport',
                'slug' => Str::slug('Sport'),
            ])
        ])->create();
    }
}
