<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->times(10)->make()->each(function($user){
            $user->save();
        });
        $user = App\User::first();
        $user->name = 'summer';
        $user->email = '2574714005@qq.com';
        $user->save();
    }
}
