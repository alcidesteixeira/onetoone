<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});
//insert data - onetoone relation
Route::get('insert', function(){

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'1234 Lustosa NY']);

    $user->address()->save($address);
});

//update data - onetoone

Route::get('update', function(){

//   $address = Address::where('user_id', '=', 1);
     $address = Address::whereUserId(1)->first();

     $address->name = "Updated address alameda da igreja";

     $address->save();

});

//read and delete data
Route::get('read', function(){

   $user = User::find(1);

   echo $user->address->name;
});

Route::get('delete', function(){

   $user = User::findOrFail(1);

   $user->address()->delete();
});