<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ChatController extends Controller
{
    //

    public function sendMessage(Request $request)
    { // Validate the incoming request
        $request->validate([
            'message' => 'required|string',
        ]);

        // Get the user message from the request
        $userMessage = $request->input('message');

        try {
            // Send the message to the Flask bot API
            $response = Http::post('http://127.0.0.1:5000/chat', [
                'message' => $userMessage,
            ]);

            // Check if the response is successful
            if ($response->successful()) {
                // Return the bot's response
                return response()->json([
                    'response' => $response->json()['response'] ?? 'No response from bot',
                ]);
            } else {
                // Return an error message if the response is not successful
                return response()->json([
                    'error' => 'Failed to get a response from the bot',
                ], $response->status());
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return response()->json([
                'error' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
}
