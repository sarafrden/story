<?php
use Illuminate\Http\Request;
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

    // Mentors
    Route::get('/Mentors/{Mentor}', 'MentorsController@show');
    Route::get('/Mentors', 'MentorsController@index');
    Route::post('/Mentors', 'MentorsController@store')->middleware('can:isAdmin');
    Route::put('/Mentors/{Mentor}', 'MentorsController@update')->middleware('can:isAdmin');
    Route::delete('/Mentors/{Mentor}', 'MentorsController@destroy')->middleware('can:isAdmin');

    // Story
    Route::get('/Story/{Story}', 'StoryController@show');
    Route::get('/Story', 'StoryController@index');
    Route::post('/Story', 'StoryController@store')->middleware('can:mentor');
    Route::put('/Story/{Story}', 'StoryController@update')->middleware('can:mentor');
    Route::delete('/Story/{Story}', 'StoryController@destroy')->middleware('can:mentor');

    // Comment
    Route::get('/Comment/{Comment}', 'CommentController@show');
    Route::get('/Comment', 'CommentController@index');
    Route::post('/Comment', 'CommentController@store');
    Route::put('/Comment/{Comment}', 'CommentController@update');
    Route::delete('/Comment/{Comment}', 'CommentController@destroy');


    });

    // Route::apiResource('Mentors', 'MentorsController');
    // // Story
    // Route::apiResource('Story', 'StoryController');
    // Route::apiResource('Users', 'UsersController');
    // Route::apiResource('Comment', 'CommentController');
    Route::get('/users/current', 'CurrentAuthenticatedUserController@show');
   // Route::post('comment', 'CommentController@store');
});
