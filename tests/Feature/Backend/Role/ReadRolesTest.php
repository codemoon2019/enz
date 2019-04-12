<?php

namespace Tests\Feature\Backend\Role;

use Tests\TestCase;

class ReadRolesTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_the_role_index_page()
    {
        $this->loginAsSystem();

        $this->get('/admin/auth/roles')->assertStatus(200);
    }
}
