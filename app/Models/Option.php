<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Get key
     *
     * @param  string  $key
     * @return object
     */
    public function scopeKey($query, $key)
    {
        return $query->whereKey($key)->first();
    }

    /**
     * Get all keys
     *
     * @param  string  $key
     * @return array
     */
    public function scopeAllKeys($query, $key)
    {
        return $query->whereKey($key)->get();
    }
}
