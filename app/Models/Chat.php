<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'student_id',
        'teacher_id',
        'text',
    ];

    /**
     * Get the student associated with the chat.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Get the teacher associated with the chat.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
