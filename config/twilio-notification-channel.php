<?php

return [
    'account_sid' => env('TWILIO_SID'),
    'auth_token' => env('TWILIO_TOKEN'),
    'from' => env('TWILIO_FROM'),
    'alphanumeric_sender' => false,
    'sms_service_sid' => null,
];
