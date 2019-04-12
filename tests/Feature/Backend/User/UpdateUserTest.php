<?php

namespace Tests\Feature\Backend\User;

use App\Events\Backend\Auth\User\UserUpdated;
use App\Models\Auth\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Event;
use Notification;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_the_edit_user_page()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/users/{$user->slug}/edit");

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_resend_users_confirmation_email()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->states('unconfirmed')->create();
        Notification::fake();

        $this->get("/admin/auth/users/{$user->slug}/account/confirm/resend");

        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function a_user_can_be_updated()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();
        Event::fake();

        $this->assertNotEquals('John', $user->first_name);
        $this->assertNotEquals('Doe', $user->last_name);
        $this->assertNotEquals('john@example.com', $user->email);

        $response = $this->patch(route('admin.auth.users.show', $user), [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'timezone' => 'UTC',
            'roles' => [config('access.users.admin_role')],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.auth.users.index'));

        $this->assertEquals('John', $user->fresh()->first_name);
        $this->assertEquals('Doe', $user->fresh()->last_name);
        $this->assertEquals('john@example.com', $user->fresh()->email);

        Event::assertDispatched(UserUpdated::class);
    }
}
