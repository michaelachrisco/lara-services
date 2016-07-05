<?php
namespace App\Services;
use Mail;
class SendWelcomeEmailService{
  // private $user;
  public function __construct($user){
    $this->user = $user;
  }

  public function call(){
    Mail::send('emails.welcome', [], function ($m) {
      $email = $this->user->email;
      $m->to($email);
      $m->subject('Welcome to my app!');
      $m->from('noreply@example.com');
      $m->bcc('notifications@example.com');
    });
  }
}
