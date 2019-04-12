<?php

namespace Tests\Feature\Backend\User;

use App\Events\Backend\Auth\User\UserPasswordChanged;
use App\Models\Auth\User;
use Event;
use Tests\TestCase;

class ChangeUserPasswordTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_a_user_change_password_page()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/users/{$user->slug}/password/change");

        $response->assertStatus(200);
    }

    /** @test */
    public function the_passwords_must_match()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();

        $response = $this->patch("/admin/auth/users/{$user->slug}/password/change", [
            'password' => '1234567',
            'password_confirmation' => '12345678',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function the_user_password_can_be_changed()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();
        Event::fake();

        $response = $this->patch("/admin/auth/users/{$user->slug}/password/change", [
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        $response->assertSessionHas(['flash_success' => 'The user\'s password was successfully updated.']);

        Event::assertDispatched(UserPasswordChanged::class);
    }
}
