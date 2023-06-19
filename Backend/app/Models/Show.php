<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'season',
        'cover',
        'wide_cover',
        'description',
        'sequel',
        'prequel',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function sequel() {
        return $this->belongsTo(Show::class, 'sequel');
    }

    public function prequel() {
        return $this->belongsTo(Show::class, 'prequel');
    }

    public function episodes() {
        return $this->hasMany(Episode::class);
    }

    public function trailers() {
        return $this->hasMany(Trailer::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function recommendation() {
        return $this->hasOne(Recommendation::class);
    }
}
