<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'Blog Post 1',
                'image' => 'images/blog1.jpg',
                'author' => 'John Doe',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ornare eros et neque tincidunt, ac hendrerit leo feugiat.',
                'slug' => Str::slug('Blog Post 1'),
                'view' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Blog Post 2',
                'image' => 'images/blog2.jpg',
                'author' => 'Jane Smith',
                'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.',
                'slug' => Str::slug('Blog Post 2'),
                'view' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Blog Post 3',
                'image' => 'images/blog3.jpg',
                'author' => 'Alex Johnson',
                'content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.',
                'slug' => Str::slug('Blog Post 3'),
                'view' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
