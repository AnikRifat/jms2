<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'sender',
        'course_id',
        'student_id',
        'teacher_id',
        'text',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    /**
     * Get the student associated with the chat.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the teacher associated with the chat.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
