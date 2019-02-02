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

use App\Article;

Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@index',
]);

Route::get('/assessment', [
	'as' => 'assessment',
	'uses' => 'HomeController@onlySourceTitle'
]);

Route::post('/posts', [
	'as' => 'getPost',
	'uses' => 'HomeController@show'
]);


Route::get('test-broadcast', function() {
	$objArticle = Article::find(1);
    $strHtml = view("landing/broadcast-post", ['objArticle' => $objArticle])->render();
    broadcast(new \App\Events\ArticleEvent($objArticle));
});