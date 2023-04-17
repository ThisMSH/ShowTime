<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'show_id',
        'logo',
        'character',
        'color'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function show() {
        return $this->belongsTo(Show::class);
    }
}
