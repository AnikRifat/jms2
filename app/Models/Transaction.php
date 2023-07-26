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
        'student_id',
        'amount',
        'ratio',
        'teacher',
        'owner',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
