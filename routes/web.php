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

// Authentication Routes
Route::get('auth/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('successful.login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Registration Routes
Route::get('auth/register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('store', 'Auth\RegisterController@store')->name('register.store');
Route::post('create', 'Auth\RegisterController@create')->name('register.create');

//Routes for pages
Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::get('/merch', 'PagesController@getMerch');
Route::get('/photos', 'PagesController@getPhotos');
Route::get('/press', 'PagesController@getPress');
Route::get('/blog', 'PagesController@getBlog');

//Routes for posts
Route::resource('/posts', 'PostController');
Route::get('/posts/index', 'PostController@index')->name('posts.index');
Route::post('/posts/store', 'PostController@store')->name('posts.store');
Route::post('/posts/create', 'PostController@create');
Route::get('/posts/{id}/show', 'PostController@show')->name('posts.show');
Route::get('/posts/{id}/edit', 'PostController@edit');
Route::get('/posts/{id}', 'PostController@destroy');
Route::put('/posts/{id}', 'PostController@update');

Route::get('blog/{slug}', ['as' => 'pages.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

//Routes for comments associated to $posts
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
// Route::get('comments/{post_id}', 'CommentsController@show');
Route::middleware(['auth'])->group(function () {
Route::get('/approval', 'HomeController@approval')->name('approval');
Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('blog', function(){
  $posts = DB::table('posts')
        ->orderBy('id', 'asc')
        // ->limit(10)
        ->get();
  return view('pages.blog', ['posts'=>$posts]);
});

Route::get('single/{slug}', 'BlogController@getSingle')->name('blog.single');
// ->where("/^[a-zA-Z0-9-_]+$/");

//routes for press releases
Route::resource('releases', 'PressReleaseController');
Route::get('/releases/index', 'PressReleaseController@index')->name('releases.index');
Route::post('/releases/store', 'PressReleaseController@store')->name('releases.store');
// Route::get('/releases/{id}/show', 'PressReleaseController@show')->name('releases.show');

Route::get('press', function(){
  $header_title = "The Press Loves Us!";
  $releases = DB::table('releases')
      ->orderBy('id', 'asc')
      // ->limit(10)
      ->get();
  return view('pages.press', ['releases'=>$releases])->with('header_title', $header_title);
});


Route::get('/home', 'HomeController@index')->name('home');

// Routes for $messages
Route::resource('/messages', 'MessageController');
Route::post('/messages/store', 'MessageController@store')->name('messages.store');
Route::post('/messages/create', 'MessageController@create');
Route::get('messages/{id}/show', 'MessageController@show');
Route::get('messages/{id}', 'MessageController@destroy');


Route::get('message', function(){
  $messages = DB::table('messages')
        ->orderBy('created_at', 'asc')
        ->limit(10)
        ->get();
  return view('pages.contact', ['messages'=> $messages]);
});

// Routes for files
// Route::get('/files/{type}/{id?}', 'FileController@index');
//
// Route::post('files/add', 'FileController@store');
// Route::post('files/edit/{id}', 'FileController@edit');
// Route::post('files/delete/{id}', 'FileController@destroy');

// routes for emails
Route::post('/send', 'EmailController@send');
