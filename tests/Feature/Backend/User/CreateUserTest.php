<?php

namespace Tests\Feature\Backend\User;

use App\Events\Backend\Auth\User\UserCreated;
use App\Models\Auth\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Event;
use Illuminate\Database\Eloquent\Model;
use Notification;
use Tests\TestCase;

class CreateUserTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_the_create_user_page()
    {
        $this->loginAsSystem();

        $response = $this->get('/admin/auth/users/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_user_has_required_fields()
    {
        $this->loginAsSystem();

        $response = $this->post('/admin/auth/users', []);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'timezone', 'password', 'roles']);
    }

    /** @test */
    public function user_email_needs_to_be_unique()
    {
        $this->loginAsSystem();
        factory(User::class)->create(['email' => 'john@example.com']);

        $response = $this->post('/admin/auth/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'active' => '1',
            'confirmed' => '0',
            'timezone' => 'UTC',
            'confirmation_email' => '1',
            'roles' => [1 => 'executive', 2 => 'user'],
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function admin_can_create_new_user()
    {
        $this->loginAsSystem();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $response = $this->post('/admin/auth/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'active' => '1',
            'confirmed' => '1',
            'timezone' => 'UTC',
            'confirmation_email' => '1',
            'roles' => [1 => config('access.users.admin_role')],
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas(
            config('access.table_names.users'),
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'active' => 1,
                'confirmed' => 1,
            ]
        );

        $response->assertSessionHas(['flash_success' => 'The user was successfully created.']);
        Event::assertDispatched(UserCreated::class);
    }

    /** @test */
    public function when_an_unconfirmed_user_is_created_a_notification_will_be_sent()
    {
        $this->loginAsSystem();
        Notification::fake();

        $response = $this->post('/admin/auth/users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'active' => '1',
            'confirmed' => '0',
            'timezone' => 'UTC',
            'confirmation_email' => '1',
            'roles' => [1 => config('access.users.admin_role')],
        ]);

        $response->assertStatus(302);

        $response->assertSessionHas(['flash_success' => 'The user was successfully created.']);

        $user = User::where('email', 'john@example.com')->first();
        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }
}
