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

Route::get('/', function () {
    return view('welcome');
});

// Contentsテーブルの読み込みアクション
Route::get('/todo', 'ContentController@index');

// タスク登録アクション(create)
Route::post('/todo/add', 'ContentController@create');

// タスクの削除アクション(remove)
Route::post('/todo/delete', 'ContentController@remove');

//タスクのstatus更新アクション(update)
Route::post('/todo/update', 'ContentController@update');

//タスクの検索アクション(serach)
Route::post('/todo/find', 'ContentController@search');
