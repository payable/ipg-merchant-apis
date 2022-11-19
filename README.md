# PAYable IPG Merchant APIs

PAYable Internet Payment Gateway to any Website / WordPress Site / Mobile
JavaScript, Java, Kotlin, Flutter, React Native

#### 1. Generate Payment URL
URL : `https://payable-apps.web.app/ipg/sandbox`
Body: `json`
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
Response:
```json
{
    "status": "PENDING",
    "uid": "8D51EB34-E5D4-4372-9F8F-030416E97A55",
    "statusIndicator": "VsE9osP3eLZEusCW6Fhgr",
    "paymentPage": "https://payable-apps.web.app/ipg/sandbox/?uid=8D51EB34-E5D4-4372-9F8F-030416E97A55"
}
```

<hr/>

#### 2. Check Payment Status

URL: `https://payable-apps.web.app/ipg/sandbox/status`
Body: `GET`
```json
uid, statusIndicator
```
Response:
```json
{
    "status": 404,
    "error": {
        "err-message": "PENDING"
    }
}
```

Status:

* 1 - Success
* 2 - Duplicate
* 3 - Failed

#### PHP Example

Authors: Aslam