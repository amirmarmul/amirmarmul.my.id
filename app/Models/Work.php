<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'year_start',
        'year_end',
        'client_id',
    ];

    /**
     * Get work services
     *
     * @return array
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'work_services');
    }
}
