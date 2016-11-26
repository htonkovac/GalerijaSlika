<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Image;
use App\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=15;$i++) 
        {
            $images =  range(1, 15*16);
            shuffle($images);
                for($j=0;$j<30;$j++)
                {
                    Like::create([
                    'user_id'=>$i,  
                    'image_id'=>array_pop($images)
                    ]);
                }
        }
    }

}
