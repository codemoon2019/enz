<?php

Route::group([
    'namespace' => 'OurTeam',
    'middleware' => 'admin',
    'as' => '',
], function () {
    Route::post('our-teams/table', 'OurTeamTableController')->name('our-teams.table');
    Route::resource('our-teams', 'OurTeamController');
});