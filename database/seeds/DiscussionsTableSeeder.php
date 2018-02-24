<?php


use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       $t1 = 'Implementing OAUTH2 with laravel passport';
       $t2 = 'Pagination in vuejs not working correctly';
       $t3 = 'Vuejs event listeners for child components';
       $t4 = 'Laravel homestad error - undetected database';

       $d1 = [

       		'title' => $t1,
       		'content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.',
       		'channel_id' => 1,
       		'user_id' => 2,
       		'slug' => str_slug($t1)


       ];

       $d2 = [

       		'title' => $t2,
       		'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
       		'channel_id' => 2,
       		'user_id' => 1,
       		'slug' => str_slug($t2)


       ];

       $d3 = [

       		'title' => $t3,
       		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
       		'channel_id' => 2,
       		'user_id' => 2,
       		'slug' => str_slug($t3)


       ];

       $d4 = [

       		'title' => $t4,
       		'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
       		'channel_id' => 1,
       		'user_id' => 2,
       		'slug' => str_slug($t4)


       ];

       Discussion::create($d1);
       Discussion::create($d2);
       Discussion::create($d3);
       Discussion::create($d4);


    }
}
