<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function send(Request $request): JsonResponse
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'subject'       => 'nullable|string|max:255',
            'message'       => 'required|string',
            'phone'         => 'nullable|string|max:50',
            'captcha_token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }

        // 2. Verify reCAPTCHA
        $recaptchaToken = $request->input('captcha_token');
        $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');

        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => $recaptchaSecret,
                'response' => $recaptchaToken,
                'remoteip' => $request->ip(),
            ]);

            $recaptchaData = $response->json();

            if (!($recaptchaData['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => 'reCAPTCHA verification failed. Please try again.',
                    'errors'  => $recaptchaData['error-codes'] ?? []
                ], 422);
            }
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Security check service error. Please try again later.'
            ], 500);
        }

        // 3. Prepare data
        $data = $validator->validated();

        // 4. Send Email
        try {
            // Send to the admin defined in the request or config
            $recipient = env('MAIL_RECEIVENT'); 
            
            Mail::to($recipient)->send(new ContactFormMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully!',
            ]);
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to send email. Please try again later.',
                'error'   => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
