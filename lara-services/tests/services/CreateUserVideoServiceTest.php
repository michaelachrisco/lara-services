<?php
use App\Video;
use App\Services\CreateUserVideoService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class CreateUserVideoServiceTest extends TestCase{
  use DatabaseMigrations;
  public function test_call(){
    $videoCount = Video::count();
    $videoStub =  $this->getMockBuilder('YoutubeDl')
                       ->disableOriginalConstructor()
                       ->setMethods(['getTitle', 'getDescription', 'getFilename'])
                       ->getMock();
    $videoStub->method('getTitle')
              ->willReturn('Video Title');
    $videoStub->method('getDescription')
              ->willReturn('Video Description');
    $videoStub->method('getFilename')
              ->willReturn('Video.ogg');
    $user = factory(App\User::class)->create();
    $service = new CreateUserVideoService($videoStub, $user);
    $subject = $service->call();

    $this->assertTrue($subject);
    $this->assertTrue($videoCount+1 === Video::count());
    $this->assertTrue($service->context()->video->wasRecentlyCreated);
  }
}
