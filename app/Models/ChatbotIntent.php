<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotIntent extends Model
{
    use HasFactory;

    protected $table = 'chatbot_intents';
    protected $fillable = [
        'name',
        'response_type',
        'response_text',
        'response_url',
        'response_json',
        'status',
    ];

    public function keywords()
    {
        return $this->hasMany(ChatbotKeyword::class, 'intent_id');
    }

    public function quickActions()
    {
        return $this->hasMany(ChatbotQuickAction::class, 'intent_id');
    }
    
    // Disable timestamps since the table does not have created_at/updated_at
    public $timestamps = false;
}
