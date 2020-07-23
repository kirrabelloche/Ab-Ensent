<?php

use App\Filiere;
use Illuminate\Support\Facades\DB;


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
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar');
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

// admin route
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('users', 'UsersController');
    Route::get('welcome', 'UsersController@getWelcome');

 });
// route validation ajax login + register
 //Route::get('/login', 'LoginController@index')->name('login');
// Route::post('/login', 'LoginController@check_login')->name('login.check_login');

 //Route::get('/register', 'RegisterController@index')->name('register.index');
//Route::post('/register', 'RegisterController@store')->name('register.store');

 //route de changement de la langue
 Route::name('language')->get('language/{lang}', 'HomeController@language');


 Route::group(['middleware'=>['web']],function(){
    Route::get('blog/{slug}', ["as"=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getIndex2']);
    Route::get('about','pagesController@getAbout');
    Route::get('contact', 'pagesController@getContact');
    Route::post('contact', 'pagesController@postContact');
    Route::get('/', 'pagesController@getIndex');
    Route::resource('posts','postController');
    //Route::post('gettest','postController@getdeptfiliere')->name('post.gettest');
    Route::post('/store', ["as"=>'store','uses'=>'postController@store']);
    Route::get('/show', ["as"=>'show','uses'=>'postController@show']);
    Route::post('/like', 'postController@postLike')->name('like');

    //categoriees
    Route::resource('categories','CategoryController', ['except' => ['create']]);
    Route::resource('tags','TagController', ['except' => ['create']]);

    //comments

    Route::post('comments/{post_id}', ['uses'=>'CommentsController@store', 'as'=> 'comments.store'] );
    Route::get('comments/{id}/edit', ['uses'=>'CommentsController@edit', 'as'=> 'comments.edit'] );
    Route::put('comments/{id}', ['uses'=>'CommentsController@update', 'as'=> 'comments.update'] );
    Route::delete('comments/{id}', ['uses'=>'CommentsController@destroy', 'as'=> 'comments.destroy'] );
    Route::get('comments/{id}/delete', ['uses'=>'CommentsController@delete', 'as'=> 'comments.delete'] );


    // route sur forum


    Route::get('forum','ThreadController@index')->name('thread.index');
    Route::resource('thread','ThreadController')->except(['index']);
           // comment topic


           Route::get('/ajax-fil', function () {

            $dep_id = Input::get('dep_id');
            $filieres= Filiere::where('departement_id','=', $dep_id)->get();

            return Response::json($filieres);
        });

        Route::get('departement','departementController@getDepatement');
        Route::get('filiere','departementController@getFiliere')->name('filiere');
      


        Route::get('/', 'HomeController@index');
        Route::get('states/get/{id}', 'HomeController@getStates');
      
     
});



