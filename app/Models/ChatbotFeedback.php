<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotFeedback extends Model
{
    use HasFactory;

    protected $table = 'chatbot_feedback';
    protected $fillable = [
        'message_id',
        'user_id',
        'feedback',
        'comment',
    ];
}
