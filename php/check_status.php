<?php

$curl = curl_init();

$uid = '4C84DD43-5C29-450E-BF40-AFC753E98EA5';
$statusIndicator = 'TQFAA0uRuX5fN76UvpKmC';

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://payable-apps.web.app/ipg/sandbox/status?uid=$uid&statusIndicator=$statusIndicator",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
