# Laravel-Livecoin

Start trading on Livecoin right away using your favorite PHP framework.

### Installation

`composer require dvomaks/laravel-livecoin`.

Add the service provider to your `config/app.php`:
 
 ``` 
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

```    
'aliases' => [
    'Livecoin' => Dvomaks\Livecoin\Livecoin::class,
],
```


This package is provided as-is. Do with it what you want ! PR's will be looked into.
I personally believe in freedom and equality, which is one of the reasons I'm in crypto.
It's also the reason I'm sharing most of the reusable code I write.

If you're feeling generous, you can always leave a tip. Any satoshi will do.
May the chain be with you. And may you be with the chain.

