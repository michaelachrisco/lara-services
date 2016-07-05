<?php
namespace App\Services;
use Deefour\Interactor\Interactor, Deefour\Interactor\Context;
use App\Video;
class CreateUserVideoService extends Interactor{
  public function __construct($video, $user){
    parent::__construct(new Context);
    $this->YoutubeDlVideo = $video;
    $this->user = $user;
  }

  public function call(){
    $this->context()->video = new Video(['title' => $this->YoutubeDlVideo->getTitle(),
                       'description' => $this->YoutubeDlVideo->getDescription(),
                       'filename' => $this->YoutubeDlVideo->getFilename(),
                       'video_path' => storage_path($this->YoutubeDlVideo->getFilename()),
                       'thumbnail_path' => storage_path('thumbnail'),
                       'status' => 'Finished',
                       'user_id' => $this->user->id ]);
    return $this->context()->video->save();
  }
}
