<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/onebind', function (Request $request) {
    $user = $request->user();
    $user->profile()->firstOrCreate(['user_id'=>$user->id],[
        'phone'     => '123456789',
    ]);
    dump($user->profile);
    dd($user->profile());

    /*$profile = \App\Profile::find(1);
    dd($profile->user);*/
});

Route::get('/manybind', function(Request $request){
    $user = $request->user();
    #绑定方式1
    /*$user->posts()->createMany([
        ['title'=>'coding100-1','body'=>'coding100.com-1'],
        ['title'=>'coding100-2','body'=>'coding200.com-2'],
    ]);*/
    #绑定方式2
    $user->posts()->saveMany([
       new \App\Post(['title'=>'coding100-3','body'=>'coding300.com-3']),
       new \App\Post(['title'=>'coding100-4','body'=>'coding400.com-4']),
    ]);
    dd($user->posts);
});

Route::get('/manysbind', function(Request $request){
    /*$habit1 = \App\Habit::create(['name'=>'LOL']);
    $habit2 = \App\Habit::create(['name'=>'Sleep']);
    $habit3 = \App\Habit::create(['name'=>'Cf']);
    $habit4 = \App\Habit::create(['name'=>'DNF']);*/

    $user = $request->user();
    #绑定方式1
    /*$user->habits()->attach([
        $habit1->id => ['level'=>'牛×'],
        $habit2->id => ['level'=>'死猪'],
        $habit3->id => ['level'=>'枪神'],
        $habit4->id => ['level'=>'牛×'],
    ]);*/

    #绑定方式2，同步关联，除指定id之外全部删除(中间表)
    //$user->habits()->sync([1,2,3]);

    #移除关联关系
    $user->habits()->detach(3);

    dd($user->habits);
});

#远层一对多
Route::get('/throughbind', function(){
    \App\Country::create(['name'=>'中国']);
    \App\Country::create(['name'=>'美国']);
});

