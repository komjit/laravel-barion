<?php

Route::group(['namespace' => 'KomjIT\Barion\Http\Controllers', 'prefix' => 'barion/komjit', 'middleware' => ['web']], function(){
    Route::get('/', 'BarionController@index');
});
