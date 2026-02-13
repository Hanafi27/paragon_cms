<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'type'];

    /**
     * Ambil value berdasarkan key
     */
    public static function getValue($key, $default = null)
    {
        $item = self::where('key', $key)->first();
        return $item ? $item->value : $default;
    }

    /**
     * Ambil semua data sebagai associative array
     */
    public static function getAllContent()
    {
        return self::pluck('value', 'key')->toArray();
    }
}
