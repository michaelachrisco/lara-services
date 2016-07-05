<?php
use App\Video;
class VideoTest extends TestCase{
  public function test_relations(){
    $subject = new Video;
    $this->assertBelongsTo($subject->user(), 'App\User');
  }
}
