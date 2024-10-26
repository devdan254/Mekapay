<?php
$data = [
    "public_key" => "50fd7740-083b-43f7-bed4-a544866b65d0",
    "private_secret" => "894acr3dhzmltjqpkf",
    "client_email" => "client_email@gmail.com",
    "reference_id" => "unique_tx",
    "amount" => 100,
    "callback_url" => "https://yourdomain.com/payment/callback",
    "success_url" => "https://yourdomain.com/payment/success",
    "cancel_url" => "https://yourdomain.com/payment/cancel"
];


$curl = curl_init();
// Set the URL of the API endpoint
curl_setopt($curl, CURLOPT_URL, 'https://mekacash.com/api/api');
// Set the request method to POST
curl_setopt($curl, CURLOPT_POST, true);
// Set the content type to application/json
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
]);
// Set the POST data
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
// Set option to return the response instead of outputting it
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
// Check for errors
if ($response === false) {
    echo "cURL Error: " . curl_error($ch);

} else {
    print_r($response);



}


curl_close($curl);


    //success
    //{"status":"success","message":"Payment Success","referenceID":"READLXPYT7W924QMBBAUEX2479ZC","payment_link":"http:\/\/readies.biz\/apimakePayment\/c69ce9f941f165aa5300b19bd31b0d84\/READLXPYT7W924QMBBAUEX2479ZC\/en"}

    //invalid credentials
    //{"status":"error","message":"Invalid credentials"}


    //payment failed
    //{"status":"failed","message":"Payment Failed"}


    //callback completed payment response 
    //{"status":"completed","message":"Payment Completed","referenceID":"READLXPYT7W924QMBBAUEX2479ZC","unique_id":"unique_tx"}

?>
