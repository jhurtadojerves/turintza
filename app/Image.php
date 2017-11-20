<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'name', 'center_id',
    ];

    public function center()
    {
        return $this->belongsTo('App\Center');
    }
}
