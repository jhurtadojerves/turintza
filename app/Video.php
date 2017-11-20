<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'name', 'center_id',
    ];

    public function center()
    {
        return $this->belongsTo('App\Center');
    }
}
