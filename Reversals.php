<?php
include 'accessToken.php';
include 'securitycridential.php';
$ReversalsUrl = 'https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request';
$request_data = array(
    'Initiator' => 'TestInit610',
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => 'TransactionReversal',
    'TransactionID' => 'OEI2AK4Q16',
    'Amount' => '1',
    'ReceiverParty' => '600987',
    'RecieverIdentifierType' => '11',
    'QueueTimeOutURL' => 'https://7c68-196-223-170-150.ngrok-free.app/daraja/QueueTimeOutURL.php',
    'ResultURL' => 'https://7c68-196-223-170-150.ngrok-free.app/daraja/ResultURL.php',
    'Remarks' => 'Test',
    'Occasion' => 'work',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $ReversalsUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>