<?php

class MandrillMailSender
{
    public static function sendRegistrationEmail($arguments = array())
    {
        try {
            $mandrill = new Mandrill('GnjsEjb7FOnZ7EeaUkplGQ');

            curl_setopt($mandrill->ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');

            $message = array(
                'text' => 'Thanks for registering with IIIE!',
                'subject' => 'IIIE Registration Confirmation',
                'from_email' => 'umar@iiie.net',
                'from_name' => 'IIIE',
                'to' => array(
                    array(
                        'email' => $arguments['to_email'],
                        'name' => $arguments['to_name'],
                        'type' => 'to'
                    )
                )
            );
            $result = $mandrill->messages->send($message);
//            print_r($result);
        } catch (Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
            throw $e;
        }
    }

}