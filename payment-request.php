<?php
require_once "Hamrahpay.php";

$api_key        = 'YOUR-API-KEY';
$callback_url   = 'HTTPS://YOUR-CALLBACK-URL.COM/CALLBACK';
$result = Hamrahpay::Instance($api_key)
    ->Amount(10000)
    ->CallbackUrl($callback_url)
    ->CustomerName('علی')
    ->Description("تست")
    ->Email('test@eample.com')
    ->Mobile('09121234567')
    ->PaymentRequest();
$result = json_decode($result,true);
if (!empty($result['status']) && $result['status']==1)
    echo '<a href="'.$result['pay_url'].'">ورود به صفحه ی پرداخت</a>';
