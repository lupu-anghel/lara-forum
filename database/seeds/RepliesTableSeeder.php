<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [

        	'user_id' => 1,
        	'discussion_id' => 1,
        	'content' => 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis.'
        ];

        $r2 = [

        	'user_id' => 2,
        	'discussion_id' => 2,
        	'content' => 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.'
        ];

        $r3 = [

        	'user_id' => 1,
        	'discussion_id' => 3,
        	'content' => 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores.'
        ];

        $r4 = [

        	'user_id' => 1,
        	'discussion_id' => 4,
        	'content' => 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam'
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
