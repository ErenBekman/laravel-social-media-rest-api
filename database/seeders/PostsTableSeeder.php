<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'first title',
                'content' => 'Lorem ipsum dolar',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGyMsjIlQShEXseQee5UbRM6ttAPJOiG0mq2Jlnot-zw6HzL0ep91RP7GLZaIpfvHYXbk&usqp=CAU'
            ],
            [
                'title' => 'second title',
                'content' => 'Lorem ipsum dolar',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGyMsjIlQShEXseQee5UbRM6ttAPJOiG0mq2Jlnot-zw6HzL0ep91RP7GLZaIpfvHYXbk&usqp=CAU'
            ]
        ];

        foreach($posts as $post) {
            Post::create($post);
        }

    }
}
