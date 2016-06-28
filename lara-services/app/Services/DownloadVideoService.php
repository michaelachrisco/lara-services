<?php
namespace App\Services;
use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;
use Exception;

class DownloadVideoService{
  public function __construct($YoutubeDl){
    $this->YoutubeDl = $YoutubeDl;
  }

  public function call($video_url = ''){
    if($video_url == '') throw new Exception('video url must be declared and not empty');
    return $this->tryDownload($video_url);;
  }

  public function tryDownload($video_url){
    $this->YoutubeDl->setDownloadPath(storage_path('videos'));
    try{
      return $this->YoutubeDl->download($video_url);
    } catch (NotFoundException $e) {
        throw NotFoundException($e);
    } catch (PrivateVideoException $e) {
        // Video is private
    } catch (CopyrightException $e) {
        // The YouTube account associated with this video has been terminated due to multiple third-party notifications of copyright infringement
    } catch (\Exception $e) {
        // Failed to download
    }
  }
}
 ?>
