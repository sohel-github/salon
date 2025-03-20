<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'amount', 'category', 'description'];
}
