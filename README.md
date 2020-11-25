# Omnipay: TelCell

**TelCell driver for the Omnipay Laravel payment processing library**

[![Latest Stable Version](https://poser.pugx.org/razmiksaghoyan/omnipay-telcell/version.png)](https://packagist.org/packages/razmiksaghoyan/omnipay-telcell)
[![Total Downloads](https://poser.pugx.org/razmiksaghoyan/omnipay-telcell/d/total.png)](https://packagist.org/packages/razmiksaghoyan/omnipay-telcell)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.5+. This package implements TelCell support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "razmiksaghoyan/omnipay-telcell": "dev"
    }
}
```

And run composer to update your dependencies:

    composer update

Or you can simply run

    composer require razmiksaghoyan/omnipay-telcell

## Basic Usage

1. Use Omnipay gateway class:

```php
    use Omnipay\Omnipay;
```

2. Initialize TelCell gateway:

```php

    $gateway = Omnipay::create('TelCell');
    $gateway->setShopId(env('SHOP_ID'));
    $gateway->setShopKey(env('SHOP_KEY'));
    $gateway->setSum(10); // Amount to charge
    $gateway->setInfo([]); // Additional information
    $gateway->setTransactionId(XXXX); // Transaction ID from your system

```

3. Call purchase, it will automatically redirect to TelCell's hosted page

```php

    $purchase = $gateway->purchase()->send();
    $purchase->redirect();

```

4. Create a webhook controller to handle the callback request at your `RESULT_URL` and catch the webhook as follows

```php

    $gateway = Omnipay::create('TelCell');
    $gateway->setShopId(env('SHOP_ID'));
    $gateway->setShopKey(env('SHOP_KEY'));
    
    $purchase = $gateway->completePurchase()->send();
    
    // Do the rest with $purchase and response with 'OK'
    if ($purchase->isSuccessful()) {
        
        // Your logic
        
    }
    
    return new Response('OK');

```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/razmiksaghoyan/omnipay-telcell/issues),
or better yet, fork the library and submit a pull request.
