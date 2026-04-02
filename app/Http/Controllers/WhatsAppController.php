<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function send(Request $request)
    {
        try {
            // Get data from request
            $phone = $request->input('phone');
            $message = $request->input('message');
            
            // Log the incoming request
            Log::info('WhatsApp Send Request', [
                'phone' => $phone,
                'message' => $message
            ]);
            
            // Twilio credentials
            $twilioSid = 'AC1c5c6ee6666b1765ddaa3a7da3f92852';
            $twilioAuthToken = '580ceb8f7f529cc8310e84445e48d0bf';
            $twilioWhatsAppFrom = 'whatsapp:+14155238886';
            
            // Ensure phone number has whatsapp: prefix
            $to = strpos($phone, 'whatsapp:') === 0 ? $phone : 'whatsapp:' . $phone;
            
            Log::info('Twilio Request', [
                'from' => $twilioWhatsAppFrom,
                'to' => $to,
                'message' => $message
            ]);
            
            // Send WhatsApp message via Twilio
            $response = Http::withBasicAuth($twilioSid, $twilioAuthToken)
                ->asForm()
                ->post("https://api.twilio.com/2010-04-01/Accounts/{$twilioSid}/Messages.json", [
                    'From' => $twilioWhatsAppFrom,
                    'To' => $to,
                    'Body' => $message
                ]);
            
            if ($response->successful()) {
                Log::info('Twilio Success Response', $response->json());
                return response()->json([
                    'success' => true,
                    'message' => 'WhatsApp message sent successfully',
                    'data' => $response->json()
                ]);
            } else {
                Log::error('Twilio WhatsApp Error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'json' => $response->json()
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send WhatsApp message',
                    'error' => $response->json(),
                    'status' => $response->status()
                ], $response->status());
            }
            
        } catch (\Exception $e) {
            Log::error('WhatsApp Controller Error: ' . $e->getMessage(), [
                'exception' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Error sending WhatsApp message',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}