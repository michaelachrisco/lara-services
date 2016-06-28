<?php
use App\Services\DownloadVideoService;
use YoutubeDl\YoutubeDl;
use YoutubeDl\Entity\Video;
class DownloadVideoServiceTest extends TestCase
{
    public function test_incorrect_call()
    {
      $stubYoutube = new Video;
      $service = new DownloadVideoService($stubYoutube);
      $this->assertException(function () use ($service) {
        $service->call('');
      }, Exception::class, 0, 'video url must be declared and not empty');
    }

    public function test_correct_call(){
      $stubYoutube = $this->getMockBuilder('YoutubeDl')
                                 ->disableOriginalConstructor()
                                 ->setMethods(['setDownloadPath', 'download'])
                                 ->getMock();
      $stubYoutube->method('download')
                  ->willReturn(new Video);

      $service = new DownloadVideoService($stubYoutube);
      $this->assertInstanceOf(Video::class, $service->call('video'));
    }
}
