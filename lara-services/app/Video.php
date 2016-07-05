<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'filename', 'video_path', 'thumbnail_path', 'status', 'user_id'
    ];

    /**
     * Returns video user.
     *
     * @return App\User
     */
    public function user(){
      return $this->belongsTo('App\User');
    }
}
