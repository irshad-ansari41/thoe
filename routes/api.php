<?php

use Illuminate\Http\Request;

include_once 'api_builder.php';

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('signin', 'ApiAuthController@postSignin');

Route::any('/create-lead/', ['as' => 'create-lead', 'uses' => 'ApiLeadController@create_lead']);
Route::get('/count-lead/', ['as' => 'count-lead', 'uses' => 'ApiLeadController@count_lead']);
Route::any('/create-contact', ['as' => 'create-contact', 'uses' => 'ApiContactController@create_contact']);
Route::any('/get-countries', ['as' => 'lead-countries', 'uses' => 'ApiLeadController@getCountries']);
Route::any('/get-ages', ['as' => 'lead-ages', 'uses' => 'ApiLeadController@getAges']);
Route::any('/get-kiosk-source', ['as' => 'lead-source', 'uses' => 'ApiLeadController@getKioskSource']);

//Events Route 
Route::get('events', ['uses' => 'ApiEventController@events']);

//Video Gallery Route 
Route::get('videos', ['uses' => 'ApiVideoGalleryController@videos']);


Route::get('/dubai/construction-updates', ['as' => 'construction.updates', 'uses' => 'ApiConstructionController@area']);
Route::get('/dubai/meydan/construction-updates', ['as' => 'community.updates', 'uses' => 'ApiConstructionController@community']);
Route::get('/dubai/meydan/{projects}/construction-updates', ['as' => 'community-area.updates', 'uses' => 'ApiConstructionController@projects']);
Route::get('/dubai/meydan/{projects}/{property}/construction-updates', ['as' => 'community-area.updates', 'uses' => 'ApiConstructionController@property']);
Route::get('/dubai/{area}/construction-updates/', ['as' => 'area.updates', 'uses' => 'ApiConstructionController@projects']);
Route::get('/dubai/{area}/{property}/construction-updates', ['as' => 'meydan.updates', 'uses' => 'ApiConstructionController@property']);
//Construction Route End

Route::get('/dubai', ['as' => 'azizi.properties', 'uses' => 'ApiPropertyController@area']);
Route::get('/dubai/meydan', ['as' => 'community.properties', 'uses' => 'ApiPropertyController@community']);
Route::get('/dubai/meydan/{projects}', ['as' => 'community-area.properties', 'uses' => 'ApiPropertyController@projects']);
Route::get('/dubai/meydan/{projects}/{property}', ['as' => 'community-area.properties', 'uses' => 'ApiPropertyController@property']);
Route::get('/dubai/{area}', ['as' => 'area.properties', 'uses' => 'ApiPropertyController@projects']);
Route::get('/dubai/{area}/{property}', ['as' => 'meydan.properties', 'uses' => 'ApiPropertyController@property']);
Route::get('/properties/brochures', ['as' => 'properties.brochures', 'uses' => 'ApiPropertyController@brochures']);
Route::get('/properties/floorplans', ['as' => 'properties.floorplans', 'uses' => 'ApiPropertyController@floorplans']);
//Property Route End

Route::any('send-contact', ['uses' => 'ApiContactController@sendContact']);
Route::get('online-js', ['uses' => 'ApiJsController@index']);

Route::post('/zoom-property',['as' => 'ApiZoom.create-lead', 'uses' => 'ApiZoomPropertyController@create_lead']);


