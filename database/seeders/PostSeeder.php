<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\Post;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $title = '';
            for ($j=1; $j <= 20 ; $j++) { 
                $title .= rand(0, strlen($characters) - 1);
            }

            $content = '';
            for ($j=1; $j <= 250 ; $j++) { 
                $content .= rand(0, strlen($characters) - 1);
            }

            $category = '';
            for ($j=1; $j <= 4 ; $j++) { 
                $category .= rand(0, strlen($characters) - 1);
            }
            
            $arr_status = [
                'publish','draft','thrash'
            ];

            $a_status     = rand(0,2);

            $status      = $arr_status[$a_status];

            DB::table('posts')->insert([
                'title'     => $title,
                'content'   => $content,    
                'category'  => $category,    
                'status'    => $status 
            ]);
        }
    }
}
