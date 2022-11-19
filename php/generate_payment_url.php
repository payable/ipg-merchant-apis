<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://payable-apps.web.app/ipg/sandbox',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "invoiceId": "INVOICE_ID",
    "merchantKey": "A75BCD8EF30E529A",
    "merchantToken": "B8727C74D29E210F9A297B65690C0140",
    "integrationType": "MSDK",
    "integrationVersion": "1.0.1",
    "refererUrl": "https://www.sandboxmerdev.payable.lk",
    "logoUrl": "https://ipg-demo-store.payable.lk/wp-content/uploads/2021/12/logo-dark.svg",
    "webhookUrl": "https://payable-apps.web.app/ipg/request-test",
    "returnUrl": "https://payable-apps.web.app/ipg/sandbox/status-view",
    "amount": "1000",
    "currencyCode": "LKR",
    "orderDescription": "PAYable Mobile IPG",
    "customerFirstName": "Aslam",
    "customerLastName": "Anver",
    "customerEmail": "aslam@payable.lk",
    "customerMobilePhone": "0762724081",
    "billingAddressStreet": "Hill Street",
    "billingAddressCity": "Dehiwala",
    "billingAddressCountry": "LK",
    "billingAddressPostcodeZip": "10350",
    "billingAddressStateProvince": "Western",
    "shippingContactFirstName": "Aslam",
    "shippingContactLastName": "Anver",
    "shippingContactEmail": "aslam@payable.lk",
    "shippingContactMobilePhone": "0762724081",
    "shippingAddressStreet": "Hill Street",
    "shippingAddressCity": "Dehiwala",
    "shippingAddressCountry": "LK",
    "shippingAddressPostcodeZip": "10350",
    "shippingAddressStateProvince": "Western"
}',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
