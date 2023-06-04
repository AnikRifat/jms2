<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'order_id',
        'transaction_id',
        'teacher_id',
        'amount',
        'ratio',
        'teacher',
        'owner',
    ];
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
