<?php
use App\User;
class UserTest extends TestCase{
  public function test_relations(){
    $subject = new User;
    $this->assertHasMany($subject->videos(), 'App\Video');
  }
}
