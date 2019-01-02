<?php

use Illuminate\Database\Seeder;

class PapersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Paper::class)->times(500)->make()->each(function ($paper){
            $paper->save();
        });
    }
}
