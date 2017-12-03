<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use GrahamCampbell\Markdown\Facades\Markdown;

class Center extends Model
{
    protected $table = 'centers';

    protected $fillable = [
        'name', 'geolocation', 'owner', 'description',
    ];

    // Init Relationships

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function latestComments()
    {
        return $this->comments()->orderBy('created_at', 'DESC');
    }

    // Finish relationships

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('centers.show', [$this->id, $this->slug]);
    }

    public function getSafeHtmlDescriptionAttribute()
    {
        return Markdown::convertToHtml(e($this->description));
    }

    public function getGlobalValorationAttribute()
    {
        return round($this->comments()->get(['ranking'])->avg('ranking'));
    }

}
