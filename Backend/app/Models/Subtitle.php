<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'show_id',
        'subtitle_name',
        'subtitle_file'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function show() {
        return $this->belongsTo(Show::class);
    }
}
