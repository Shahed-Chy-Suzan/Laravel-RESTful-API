<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



        // =========== Class =============
        //  Route::apiResource('/class','Api\ClassNameController');  //----OR-----,
        // Route::get('/class','Api\ClassNameController@index');
        // Route::post('/class','Api\ClassNameController@store');
        // Route::delete('/class/{id}','Api\ClassNameController@destroy');
        // Route::get('/class/{id}','Api\ClassNameController@show');
        // Route::PATCH('/class/{id}','Api\ClassNameController@update');


// =========== Class =============
Route::apiResource('/class','Api\ClassController');

// =========== Subject ============
Route::apiResource('/subject','Api\SubjectController');

// =========== Section ============
Route::apiResource('/section','Api\SectionController');

// =========== Student ============
Route::apiResource('/student','Api\StudentController');

        //--Example_Route: http://127.0.0.1:8000/api/student/




// ========== JWT Auth =========
Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload','AuthController@payload');
    Route::post('register','AuthController@register');

});

        //--Example_Route: http://127.0.0.1:8000/api/auth/login
