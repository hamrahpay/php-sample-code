<?php
require_once "Hamrahpay.php";

$api_key        = 'YOUR-API-KEY';
$payment_token  = $_GET['payment_token'];
$status         = $_GET['status'];

if ($status=='OK')
{
    $result = Hamrahpay::Instance($api_key)->VerifyPayment($payment_token);
    $result = json_decode($result,true);
    if ($result['status']==100) // succeed , first time verification
    {
        echo "<br> Reference Number:".$result['reference_number'];
        echo "<br> Reserve Number:".$result['reserve_number'];
        echo "<br> Amount:".$result['amount'];
    }
    else if ($result['status']==101) // succeed, after first time verification
    {
        echo "<br> Amount:".$result['amount'];
    }
    else
    {
        // show error message
        echo $result['error_message'];
    }
}
else // NOK
{
    // show error
    echo "NOK";
}