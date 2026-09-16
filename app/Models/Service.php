<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name',
        'starting_price',
        'description',
    ];

    public function parlors(): BelongsToMany
    {
        return $this->belongsToMany(
            Parlor::class,
            'parlor_services',
            'service_id',
            'parlor_id'
        );
    }
}
