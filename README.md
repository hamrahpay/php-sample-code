# [Hamrahpay](https://hamrahpay.com) Composer Library 

[Hamrahpay](https://hamrahpay.com) Online Payment PHP Library


To Use Composer and laravel version Please use this link : [Hamrahpay Composer Library](https://github.com/hamrahpay/hamrahpay-composer-library)


## Usage

### Pay Request
```php
require_once "Hamrahpay.php";

$api_key        = 'YOUR-API-KEY';
$callback_url   = 'HTTPS://YOUR-CALLBACK-URL.COM/CALLBACK';
$hamrahpay = Hamrahpay::Instance($api_key);
$result = $hamrahpay
    ->Amount(10000)
    ->CallbackUrl($callback_url)
    ->CustomerName('علی')
    ->Description("تست")
    ->Email('test@example.com')
    ->Mobile('09121234567')
    ->PaymentRequest();

if (!empty($result['status']) && $result['status']==1)
    $hamrahpay->Redirect();

```


### Verify Payment
```php
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
```


### Get Unverified Transactions

sometime in many reasons your server failed in get result of transaction, then you can get unverified transactions and verifing them

get unverified transaction 

```php
require_once "Hamrahpay.php";

$api_key        = 'YOUR-API-KEY';
$hamrahpay = Hamrahpay::Instance($api_key);
$unverified_transactions = $hamrahpay->getUnverifiedTransactions();

print_r($unverified_transactions);
```


[Hamrahpay.com](https://hamrahpay.com)