<?php

namespace Tests\Feature\Frontend;

use App\Mail\Frontend\Contact\SendContact;
use Queue;
use Tests\TestCase;


class FillContactFormTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->markTestSkipped();
    }

    /** @test */
    public function the_contact_route_exists()
    {
        $this->preparePages();
        $this->prepareMenu(false);
        $r = $this->get('/contact-us');
        // dd($r);
        $r->assertStatus(200);
    }

    /** @test */
    public function a_contact_mail_gets_sent()
    {
        Queue::fake();

        $response = $this->post('/contact/send', [
            'full_name' => 'John Doe',
            'subject' => 'subject',
            'email' => 'john@example.com',
            'contact' => '+49 123 456 78',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHas(['flash_success' => __('alerts.frontend.contact.sent')]);
        Queue::push(SendContact::class);
        Queue::assertPushed(SendContact::class);
    }

    /** @test */
    public function it_redirects_back_after_success()
    {
        Queue::fake();

        $this->get('/contact-us');

        $response = $this->post('/contact/send', [
            'full_name' => 'John Doe',
            'subject' => 'subject',
            'email' => 'john@example.com',
            'contact' => '+49 123 456 78',
            'message' => 'This is a test message',
        ]);

        $response->assertRedirect('/contact-us');
        $response->assertSessionHas(['flash_success' => __('alerts.frontend.contact.sent')]);
        Queue::push(SendContact::class);
        Queue::assertPushed(SendContact::class);
    }

    /** @test */
    public function contact_is_not_required()
    {
        Queue::fake();

        $response = $this->from('/contact-us')->post('/contact/send', [
            'full_name' => 'John Doe',
            'subject' => 'subject',
            'email' => 'john@example.com',
            // 'contact' => '+49 123 456 78',
            'message' => 'This is a test message',
        ]);
        // $response->assertSessionHas(['flash_success' => __('alerts.frontend.contact.sent')]);
        // $response->assertSessionHas('flash_success');
        Queue::push(SendContact::class);
        Queue::assertPushed(SendContact::class);
    }

    /** @test */
    public function full_name_is_required()
    {
        $response = $this->from('/contact')->post('/contact/send', [
            'email' => 'john@example.com',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHasErrors('full_name');
    }

    /** @test */
    public function email_is_required()
    {
        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'John Doe',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function message_is_required()
    {
        $response = $this->from('/contact')->post('/contact/send', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('message');
    }
}
