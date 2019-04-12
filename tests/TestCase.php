<?php

namespace Tests;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use UsesDatabase;

    protected function setUp(): void
    {
        $this->prepareDatabase();

        parent::setUp();

        $this->setUpDatabase(function () {
            $this->seed();
        });
        $this->beginDatabaseTransaction();

        config(['access.login' => true]);
    }

    protected function prepareSlider($eedAuth = true)
    {
        //$this->loginAsAdmin(false, 1, $eedAuth);
        //$this->loginAsAdmin(false, 2, false);
        //(new \SlideTableSeeder)->run();
    }

    protected function prepareMenu($eedAuth = true)
    {
        //$this->loginAsAdmin(false, 1, $eedAuth);
        //$this->loginAsAdmin(false, 2, false);
        //(new \MenuTableSeeder)->run();
    }

    protected function preparePages($eedAuth = true)
    {
        //$this->loginAsAdmin(false, 1, $eedAuth);
        //$this->loginAsAdmin(false, 2, false);
        //(new \PageTableSeeder)->run();
    }

    protected function loginAsSystem($actingAs = true, $userId = 1, $seedAuth = true)
    {

        $actingUserAs = User::find($userId);

        if ($actingAs) {
            $this->actingAs($actingUserAs);
        }
        return $actingUserAs;
    }

    private function _seedAuth()
    {
        //$system = Role::create(['name' => config('access.users.system_role')]);
        //$admin = Role::create(['name' => config('access.users.admin_role')]);
        //$user = Role::create(['name' => config('access.users.default_role')]);
        //
        //$vieBackendPermission = factory(Permission::class)->create(['name' => config('access.users.default_permissions.back_end_view_permission')]);
        //
        //$system->givePermissionTo($vieBackendPermission);
        //$admin->givePermissionTo($vieBackendPermission);
        //
        //$userSystem = factory(User::class)->create();
        //$userAdmin = factory(User::class)->create();
        //$userannonymous = factory(User::class)->create();
        //
        //$userSystem->assignRole(config('access.users.system_role'));
        //$userAdmin->assignRole(config('access.users.admin_role'));
        //$userannonymous->assignRole(config('access.users.default_role'));
    }
}
//findByName
