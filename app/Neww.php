<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use GrahamCampbell\Markdown\Facades\Markdown;

class Neww extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'name', 'content', 'cover',
    ];

    // getters
    public function getUrlAttribute()
    {
        return route('news.show', [$this->id, $this->slug]);
    }

    public function getSafeHtmlDescriptionAttribute()
    {
        return Markdown::convertToHtml(e($this->content));
    }

    // setters
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }



}
