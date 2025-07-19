<?php

namespace src\service;

use Twilio\Rest\Client;

class SmsService
{
    public function sendSms(string $destinationNumber, string $message): void
    {
        $sid    = TWILIO_SID;
        $token  = TWILIO_TOKEN;
        $twilio = new Client($sid, $token);

        if (substr($destinationNumber, 0, 4) !== '+221') {
            $destinationNumber = '+221' . ltrim($destinationNumber, '0');
        }

        try {
            $twilio->messages->create(
                $destinationNumber,
                [
                    'from' => TWILIO_FROM,
                    'body' => $message
                ]
            );
        } catch (\Exception $e) {
        }
    }

    public static function getInstance(): self
    {
        return new self();
    }
}