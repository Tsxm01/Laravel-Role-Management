<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[Controller::class,'index']);
Route::get('login',[Controller::class,'login_page']);
Route::post('admin-login',[Controller::class,'login']);


Route::get('logout', function(){
    session()->pull('id',null);
    return redirect('/');
   });

Route::group(['middleware'=>'admin_login'],function(){

// User
Route::get('add-role',[Controller::class,'add_user']);
Route::post('create-user',[Controller::class,'create_user']);
Route::post('edit-user',[Controller::class,'edit_user']);
Route::get('delete-user/{id}',[Controller::class,'delete_user']);
// end

// add permission
Route::get('add-permission',[Controller::class,'add_permission']);
Route::post('create-permission',[Controller::class,'create_permission']);
Route::post('edit-permission',[Controller::class,'edit_permission']);
Route::get('delete-permission/{id}',[Controller::class,'delete_permission']);

// Assign permission
Route::get('assign-role',[Controller::class,'assign_permission']);
Route::post('create-role',[Controller::class,'creat_role']);

});


