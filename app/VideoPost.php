<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoPost extends Model
{
 
    // Table Name
    protected $table = 'videopost';
    // Primary Key
    public $primaryKey='id';
    // Timestamps
    public $timestamps=true;
    //relationship
    public function user(){
        return $this->belongsTo('App\User');
    }
}
