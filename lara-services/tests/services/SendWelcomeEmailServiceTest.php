<?php
use MailThief\Facades\MailThief;
use App\User;
use App\Services\SendWelcomeEmailService;
class RegistrationTest extends TestCase
{
    public function test_new_users_are_sent_a_welcome_email()
    {
        // Block and intercept outgoing mail, important!
        MailThief::hijack();
        //build sample user
        $user = new User;
        $user->email = 'foo@example.com';
        //Build Service
        $service = new SendWelcomeEmailService($user);
        $service->call();

        // Check that an email was sent to this email address
        $this->assertTrue(MailThief::hasMessageFor('foo@example.com'));

        // BCC addresses are included too
        $this->assertTrue(MailThief::hasMessageFor('notifications@example.com'));

        // Make sure the email has the correct subject
        $this->assertEquals('Welcome to my app!', MailThief::lastMessage()->subject);

        // Make sure the email was sent from the correct address
        // (`from` can be a list, so we return it as a collection)
        $this->assertEquals('noreply@example.com', MailThief::lastMessage()->from->first());
    }
}
