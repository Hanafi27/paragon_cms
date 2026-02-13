<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotKeyword extends Model
{
    use HasFactory;

    protected $table = 'chatbot_keywords';
    protected $fillable = [
        'intent_id',
        'keyword',
    ];

    public function intent()
    {
        return $this->belongsTo(ChatbotIntent::class, 'intent_id');
    }
    
    // Nonaktifkan timestamps karena tabel tidak punya kolom created_at/updated_at
    public $timestamps = false;
}
