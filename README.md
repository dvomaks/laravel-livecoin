# Laravel-Livecoin

Start trading on Livecoin right away using your favorite PHP framework.

### Installation

`composer require dvomaks/laravel-livecoin`.

Add the service provider to your `config/app.php`:
 
```php  
 'providers' => [
    Dvomaks\Livecoin\LivecoinServiceProvider::class,
 ],
```
 
...run `php artisan vendor:publish` to copy the config file.

Edit the `config/livecoin.php` or add Bittrex api and secret in your `.env` file

```
LIVECOIN_KEY={YOUR_API_KEY}
LIVECOIN_SECRET={YOUR_API_SECRET}

```

Add the alias to your `config/app.php`:

```php 
'aliases' => [
    'Livecoin' => Dvomaks\Livecoin\Livecoin::class,
],
```

### Usage

Please refer to the [Api Documentation](https://www.livecoin.net/api/common) for more info, or read the [docblocks](https://github.com/dvomaks/laravel-livecoin/blob/master/src/Client.php) !

```php
$params = array(...);
```

[Public data documentation](https://www.livecoin.net/api/public)

```php
Livecoin::exchangeTicker($params);
Livecoin::exchangeLastTrades($params);
Livecoin::exchangeOrderBook($params);
Livecoin::exchangeAllOrderBook($params);
Livecoin::exchangeMaxbidMinask($params);
Livecoin::exchangeRestrictions($params);
Livecoin::infoCoinInfo(); 
```

[Private user data documentation](https://www.livecoin.net/api/public)

```php
Livecoin::exchangeTrades($params);
Livecoin::exchangeClientOrders($params);
Livecoin::exchangeOrder($params);
Livecoin::paymentBalances($params);
Livecoin::paymentBalance($params);
Livecoin::paymentHistoryTransactions($params);
Livecoin::paymentHistorySize($params);
Livecoin::exchangeCommissions();
Livecoin::exchangeCommissionCommonInfo();
```

[Open/cancel orders documentation](https://www.livecoin.net/api/orders)

```php
Livecoin::exchangeBuylimit($params);
Livecoin::exchangeSelllimit($params);
Livecoin::exchangeBuymarket($params);
Livecoin::exchangeSellmarket($params);
Livecoin::exchangeCancellimit($params);
```

[Deposit and withdrawal documentation](https://www.livecoin.net/api/withdrawal)  
   
```php
Livecoin::paymentGetAddress($params);
Livecoin::paymentOutCoin($params);
Livecoin::paymentOutPayeer($params);
Livecoin::paymentOutCapitalist($params);
Livecoin::paymentOutAdvcah($params);
Livecoin::paymentOutCard($params);
Livecoin::paymentOutOkpay($params);
Livecoin::paymentOutPerfectmoney($params);
```

[Vouchers documentation](https://www.livecoin.net/api/vouchers)

```php
Livecoin::paymentVoucherMake($params);
Livecoin::paymentVoucherAmount($params);
Livecoin::paymentVoucherRedeem($params);
```

### Example


[To retrieve information on the latest transactions for a specified currency pair.](https://www.livecoin.net/api/public#exchangelast_trades)

```php

use Dvomaks\Livecoin\Livecoin;

$data = Livecoin::exchangeLastTrades([
        'currencyPair'  => 'BTC/USD',
        'minutesOrHour' => 'true',
        'type'          => 'BUY',
    ]);
    
dd($data);
```

This package is provided as-is. Do with it what you want ! PR's will be looked into.
I personally believe in freedom and equality, which is one of the reasons I'm in crypto.
It's also the reason I'm sharing most of the reusable code I write.

If you're feeling generous, you can always leave a tip. Any satoshi will do.
May the chain be with you. And may you be with the chain.