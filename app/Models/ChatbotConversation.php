<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotConversation extends Model
{
    use HasFactory;

    protected $table = 'chatbot_conversations';
    protected $fillable = [
        'user_id',
        'session_id',
        'started_at',
        'ended_at',
    ];
    // Nonaktifkan timestamps karena tabel tidak punya kolom created_at/updated_at
    public $timestamps = false;
}
