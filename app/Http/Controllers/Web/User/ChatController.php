<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ChatController extends Controller
{
    //

    public function sendMessage(Request $request)
    {
        // $request->validate([
        //     'message' => 'required|string',
        // ]);

        // $userMessage = $request->input('message');

        // // Send the message to the bot API
        // $response = Http::post('https://your-bot-api-endpoint', [
        //     'message' => $userMessage,
        // ]);

        // Return the bot's response
        return response()->json([
            // 'response' => $response->json()['response'] ?? 'No response from bot',
            'response' => 'hello ,How i can help you?',
        ]);
    }
}
