<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Api\AdminAuthController;

// Endpoint untuk chatbot message dan feedback
Route::post('/chatbot/message', [ChatbotController::class, 'storeMessage']);
Route::post('/chatbot/feedback', [ChatbotController::class, 'storeFeedback']);
Route::get('/chatbot/intents', [ChatbotController::class, 'intents']);

// Route login admin JWT
Route::post('/admin/login', [AdminAuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
