<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotQuickAction extends Model
{
    use HasFactory;

    protected $table = 'chatbot_quick_actions';
    protected $fillable = [
        'intent_id',
        'label',
        'icon_svg',
        'url',
        'display_context',
        'display_order',
        'status',
    ];

    public function intent()
    {
        return $this->belongsTo(ChatbotIntent::class, 'intent_id');
    }
}
