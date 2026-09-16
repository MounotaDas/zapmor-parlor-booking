<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'customer_name',
        'email',
        'parlor_id',
        'service_id',
        'appointment_datetime',
        'note',
        'status',
    ];

    protected $casts = [
        'appointment_datetime' => 'datetime',
    ];

    public function parlor(): BelongsTo
    {
        return $this->belongsTo(
            Parlor::class,
            'parlor_id',
            'parlor_id'
        );
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(
            Service::class,
            'service_id',
            'service_id'
        );
    }
}