<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements'; // ← هذا هو الحل

    protected $fillable = ['text', 'category', 'is_active'];

    public static function active()
    {
        return static::where('is_active', true)
                     ->orderBy('created_at', 'desc')
                     ->get();
    }
}