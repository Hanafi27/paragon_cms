<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotMessage extends Model
{
    use HasFactory;

    protected $table = 'chatbot_messages';
    protected $fillable = [
        'conversation_id',
        'sender',
        'message',
        'intent_id',
    ];

    public function conversation()
    {
        return $this->belongsTo(ChatbotConversation::class, 'conversation_id');
    }

    public function intent()
    {
        return $this->belongsTo(ChatbotIntent::class, 'intent_id');
    }
    
    // Nonaktifkan timestamps karena tabel tidak punya kolom created_at/updated_at
    public $timestamps = false;
}
