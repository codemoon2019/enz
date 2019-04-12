<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'namespace' => 'Auth',
    'middleware' => 'role:' . config('access.users.system_role') . '|' . config('access.users.admin_role'),
], function () {
    /*
     * User Management
     */
    Route::group(['namespace' => 'User'], function () {

        /*
         * User Status'
         */
        Route::get('users/deactivated', 'UserStatusController@getDeactivated')->name('users.deactivated');
        Route::get('users/deleted', 'UserStatusController@getDeleted')->name('users.deleted');

        /*
         * User CRUD
         */
        Route::resource('users', 'UserController');

        /*
         * Specific User
         */
        Route::group([
            'prefix' => 'users/{user}',
            'as' => 'users.',
        ], function () {
            // Account
            Route::get('account/confirm/resend',
                'UserConfirmationController@sendConfirmationEmail')->name('account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'UserStatusController@mark')->name('mark')->where(['status' => '[0,1]']);

            // Social
            Route::delete('social/{social}/unlink', 'UserSocialController@unlink')->name('social.unlink');

            // Confirmation
            Route::get('confirm', 'UserConfirmationController@confirm')->name('confirm');
            Route::get('unconfirm', 'UserConfirmationController@unconfirm')->name('unconfirm');

            // Password
            Route::get('password/change', 'UserPasswordController@edit')->name('change-password');
            Route::patch('password/change', 'UserPasswordController@update')->name('change-password.post');

            // Access
            Route::get('login-as', 'UserAccessController@loginAs')->name('login-as');

            // Session
            Route::get('clear-session', 'UserSessionController@clearSession')->name('clear-session');
        });

        /*
         * Deleted User
         */
        Route::group([
            'prefix' => 'users/{deletedUser}',
            'as' => 'users.',
        ], function () {
            Route::get('delete', 'UserStatusController@delete')->name('delete-permanently');
            Route::get('restore', 'UserStatusController@restore')->name('restore');
        });
    });

    /*
     * Role Management
     */
    Route::group(['namespace' => 'Role'], function () {
        Route::resource('roles', 'RoleController', ['except' => ['show']]);
    });
});
