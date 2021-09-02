<?php

Route::group(['namespace' => 'Api'], function () {
    // home
    Route::get('/articles', 'HomeController@fetchArticles');
    Route::get('/news', 'HomeController@fetchNews');

    // materi
    Route::get('/materi', 'MateriController@fetchMateri');

    // sertifikat
    Route::get('/certificate/{email?}/{seminar_id?}', 'CertificateController@downloadCertificate');
});

