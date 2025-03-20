<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'salon_id', 'service_id', 'appointment_time', 'status', 'payment_status'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function salon(): BelongsTo {
        return $this->belongsTo(Salon::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }
}
