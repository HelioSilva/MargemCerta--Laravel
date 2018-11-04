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


Route::get ('/', function(){
   return view('home');
});
Route::get('/api','Control@home');
Route::post('/api','Control@api');

Route::get('/margem','Control@margem');

Route::resource('produtos','ProdutoController');


// Route::get('/', function(){

//  $client = new \GuzzleHttp\Client();
//     $response = $client->request('POST', 'https://jsonplaceholder.typicode.com/todos');
//     $response = $response->getBody()->getContents();
//     echo '<pre>';
//     print_r($response);


// });
