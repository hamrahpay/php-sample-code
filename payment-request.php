<?php
require_once "Hamrahpay.php";

$api_key        = 'YOUR-API-KEY';
$callback_url   = 'HTTPS://YOUR-CALLBACK-URL.COM/CALLBACK';
$hamrahpay = Hamrahpay::Instance($api_key);
$result = $hamrahpay
    ->Amount(10000)
    ->CallbackUrl($callback_url)
    ->CustomerName('علی')
    ->Description("تست")
    ->Email('test@eample.com')
    ->Mobile('09121234567')
    ->PaymentRequest();

if (!empty($result['status']) && $result['status']==1)
    $hamrahpay->Redirect();
