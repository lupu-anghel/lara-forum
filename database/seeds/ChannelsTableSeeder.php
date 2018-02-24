<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $channel1 = ['title' => 'Laravel', 'slug' => str_slug('Laravel') ]; 
       $channel2 = ['title' => 'VueJs','slug' => str_slug('VueJs') ];
       $channel3 = ['title' => 'PHP', 'slug' => str_slug('PHP') ];
       $channel4 = ['title' => 'AngularJs', 'slug' => str_slug('AngularJs') ];
       $channel5 = ['title' => 'Hangouts', 'slug' => str_slug('Hangouts') ];

       Channel::create($channel1);
       Channel::create($channel2);
       Channel::create($channel3);
       Channel::create($channel4);
       Channel::create($channel5);

    }
}
