<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Video::class)->times(100)->make()->each(function($video){
            $video->save();
        });
    }
}
