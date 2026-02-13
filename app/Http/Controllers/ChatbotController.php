<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotIntent;
use App\Models\ChatbotConversation;
use App\Models\ChatbotMessage;
use App\Models\ChatbotFeedback;

class ChatbotController extends Controller
{
    public function storeMessage(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string|max:100',
            'sender' => 'required|in:user,bot',
            'message' => 'required|string',
            'intent_id' => 'nullable|integer',
        ]);

        // Cari atau buat conversation
        $conversation = ChatbotConversation::firstOrCreate([
            'session_id' => $request->session_id
        ], [
            'user_id' => auth()->id(),
            'started_at' => now(),
        ]);

        $msg = ChatbotMessage::create([
            'conversation_id' => $conversation->id,
            'sender' => $request->sender,
            'message' => $request->message,
            'intent_id' => $request->intent_id,
        ]);

        return response()->json(['success' => true, 'message_id' => $msg->id]);
    }

    public function storeFeedback(Request $request)
    {
        $request->validate([
            'message_id' => 'required|integer',
            'feedback' => 'required|in:like,dislike',
            'comment' => 'nullable|string',
        ]);

        $fb = ChatbotFeedback::create([
            'message_id' => $request->message_id,
            'user_id' => auth()->id(),
            'feedback' => $request->feedback,
            'comment' => $request->comment,
        ]);

        return response()->json(['success' => true, 'feedback_id' => $fb->id]);
    }

    public function intents()
    {
        $faqs = ChatbotIntent::with('keywords')
            ->where('status', 'aktif')
            ->orderByDesc('created_at')
            ->get();
        return response()->json($faqs);
    }
}
