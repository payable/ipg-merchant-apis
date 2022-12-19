# PAYable IPG Merchant APIs

PAYable Internet Payment Gateway to any Website / WordPress Site / Mobile / Flutter

PHP, JavaScript, Java, Kotlin, Flutter, React Native

<hr/>

Server Environments:

```http
Sandbox: https://payable-apps.web.app/ipg/sandbox
Production: https://payable-apps.web.app/ipg/production
```

<hr/>

#### 1. Generate Payment URL

```http
POST /
Content-Type: application/json
```
> The form body is also acceptable when posting a form `application/x-www-form-urlencoded`

```json
{
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
    "orderDescription": "Puma T-Shirt",
    "customerFirstName": "Aslam",
    "customerLastName": "Anver",
    "customerEmail": "customer@example.com",
    "customerMobilePhone": "0770000000",
    "billingAddressStreet": "Hill Street",
    "billingAddressCity": "Dehiwala",
    "billingAddressCountry": "LK",
    "billingAddressPostcodeZip": "10350",
    "billingAddressStateProvince": "Western",
    "shippingContactFirstName": "Aslam",
    "shippingContactLastName": "Anver",
    "shippingContactEmail": "customer@example.com",
    "shippingContactMobilePhone": "0770000000",
    "shippingAddressStreet": "Hill Street",
    "shippingAddressCity": "Dehiwala",
    "shippingAddressCountry": "LK",
    "shippingAddressPostcodeZip": "10350",
    "shippingAddressStateProvince": "Western"
}
```

Success Response:

```json
{
    "status": "PENDING",
    "uid": "8D51EB34-E5D4-4372-9F8F-030416E97A55",
    "statusIndicator": "VsE9osP3eLZEusCW6Fhgr",
    "paymentPage": "https://payable-apps.web.app/ipg/sandbox/?uid=8D51EB34-E5D4-4372-9F8F-030416E97A55"
}
```

Error Response:

```json
{
    "status": 400,
    "error": {
        "err-message": "invalid Authentication"
    }
}
```

> Payment Page

![](/images/payment_page.png)

<hr/>

#### 2. Check Payment Status

```http
GET /status
```

```text
uid, statusIndicator
```

Success Responses:

```json
{
    "status": 200,
    "data": {
        "statusMessage": "SUCCESS"
    }
}
```

Error Responses:

```json
{
    "status": 404,
    "error": {
        "err-message": "PENDING"
    }
}
```

 > Once the webhook is triggered:

```json
{
    "status": 200,
    "data": {
        "payableTransactionId": "8edd851d-67bf-11ed-a017-ffee2c49f453",
        "paymentMethod": 1,
        "payableOrderId": "oid-4d04fb6d-67bf-11ed-90dd-479eff8ea93a",
        "statusMessage": "SUCCESS",
        "paymentType": 1,
        "paymentScheme": "CHINA_UNIONPAY",
        "txType": "ONE_TIME_PAYMENT"
    }
}
```

> Once the webhook is triggered with failure transaction attempts:

```json
{
    "status": 404,
    "error": {
        "err-message": "PENDING"
    },
    "failures": [
        {
            "payableTransactionId": "685e76b6-67a1-11ed-a333-e56ff946e0a9",
            "paymentMethod": 1,
            "payableOrderId": "oid-24cc0778-67a1-11ed-b7f5-8bd93b27f26c",
            "statusMessage": "FAILURE",
            "paymentType": 1,
            "paymentScheme": "MASTERCARD",
            "txType": "ONE_TIME_PAYMENT"
        },
        {
            "payableTransactionId": " c3ff309b-67a1-11ed-a333-51569715c33f",
            "paymentMethod": " 1",
            "payableOrderId": " oid-8f7aaaea-67a1-11ed-b7f5-99d7358edafa",
            "statusMessage": " SUCCESS",
            "paymentType": " 1",
            "paymentScheme": " CHINA_UNIONPAY",
            "txType": " ONE_TIME_PAYMENT"
        }
    ]
}
```

> If you miss providing the `returnUrl` the default status page will be called at the end of the transaction as below.

![](/images/payment_status_page.png)

#### 3. Webhook Response

```http
POST
```

```json
{
    "payableTransactionId": "8edd851d-67bf-11ed-a017-ffee2c49f453",
    "paymentMethod": 1,
    "payableOrderId": "oid-4d04fb6d-67bf-11ed-90dd-479eff8ea93a",
    "statusMessage": "SUCCESS",
    "paymentType": 1,
    "paymentScheme": "CHINA_UNIONPAY",
    "txType": "ONE_TIME_PAYMENT"
}
```

<hr/>

#### PHP Example

```php
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
```
