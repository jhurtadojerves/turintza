<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content', 'ranking', 'user_id', 'center_id',
    ];

    public function center()
    {
        return $this->belongsTo('App\Center');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getSafeHtmlContentAttribute()
    {
        return Markdown::convertToHtml(e($this->content));
    }

}
