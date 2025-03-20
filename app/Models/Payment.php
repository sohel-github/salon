<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id', 'user_id', 'amount', 'payment_method', 'status', 'transaction_id'];

    public function appointment(): BelongsTo {
        return $this->belongsTo(Appointment::class);
    }
}
