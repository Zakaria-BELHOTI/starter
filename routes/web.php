<?php

Auth::routes(['verify'=>true]);

Route::get('/', 'HomeController@index')->name('home') ->middleware('verified');

Route::get('/home',function(){

    return 'Home';
});

Route::get('/dashboard',function(){
    return 'dashboard';
});

Route::get('/redirect/{service}', 'SocialController@redirect');

Route::get('/callback/{service}', 'SocialController@callback');

//Route::resource('/offers', 'OfferController');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'offers'], function () {
        Route::get('create', 'OfferController@create');
        Route::get('all', 'OfferController@getAllOffers')->name('offers.all');
        Route::post('store', 'OfferController@store')->name('offers.store');

        // Route::get('edit/{offer_id}', 'OfferController@editOffer');
        // Route::post('update/{offer_id}', 'OfferController@UpdateOffer')->name('offers.update');
        // Route::get('delete/{offer_id}', 'OfferController@delete')->name('offers.delete');
        // Route::get('get-all-inactive-offer', 'OfferController@getAllInactiveOffers');
    });

});