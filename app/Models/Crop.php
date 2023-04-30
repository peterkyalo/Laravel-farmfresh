<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        // 'image',
        'duration',
        'acrerange',
        'note',
    ];

    public function user() {
        $this->belongsTo(User::class);
    }
}