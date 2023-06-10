<?php
use AfricasTalking\SDK\AfricasTalking;
function sendSms($phone,$message)
{
    $username = env("AFRICASTALKING_USERNAME"); // use 'sandbox' for development in the test environment
    $apiKey   = env('AFRICASTALKING_API_KEY'); // use your sandbox app API key for development in the test environment
    $AT       = new AfricasTalking($username, $apiKey);

// Get one of the services
    $sms      = $AT->sms();
    $phoneArr = explode($phone, 254725757808);

// Use the service
    $result   = $sms->send([
        'to'      => $phoneArr,
        'message' => $message
    ]);
}

function formatPhone($phoneNumber){
    $phoneNumber = str_replace(' ', '', $phoneNumber);
    return ltrim(phone($phoneNumber, 'KE', 'e164'), '+');
}
