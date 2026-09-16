<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Parlor extends Model
{
    protected $primaryKey = 'parlor_id';

    protected $fillable = [
        'name',
        'specialization',
        'fee',
        'bio',
        'photo',
        'availability_status',
        'rating',
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(
            Service::class,
            'parlor_services',
            'parlor_id',
            'service_id'
        );
    }
}