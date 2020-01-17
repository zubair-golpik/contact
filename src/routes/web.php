
<?php


Route::group(['namespace' => 'golpik\contact\Http\Controllers'], function () {
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::post('contact', 'ContactController@send');
});