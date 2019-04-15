<?php

/**
 * All route names are prefixed with 'frontend.our-team'.
 */
Route::group([
    'namespace' => 'OurTeam',
    'prefix' => 'our-teams',
    'as' => 'our-teams.',
], function () {
    Route::get('', 'OurTeamController@index')->name('index');
    Route::get('/{our_team}', 'OurTeamController@show')->where('our-team', '.+')->name('show');
});
