<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'show_id',
        'episode_type',
        'title',
        'number',
        'description',
        'thumbnail',
        'video'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function show() {
        return $this->belongsTo(Show::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function subtitles() {
        return $this->hasMany(Subtitle::class);
    }
}
