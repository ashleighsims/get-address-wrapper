# Get Address IO Wrapper

A simple wrapper for the GetAddress IO service. Allowing the retrieval of address information from the provided post code. as well as other services.

## Installation

Before you can start using GetAddress IO you will need to register for an API key. There is a free API key that you can use for 30 days before moving onto a paid plan.

You can get an API key and find out more information here: https://getaddress.io/

Via Composer

``` bash
$ composer require ashleighsims/get-address-wrapper
```

### Laravel

If you're using this package in Laravel auto discovery has been enabled so you should be able to hit the ground running (when using Laravel 5.5 and beyond)

if you aren't using Laravel 5.5 and above you will need to manually register some bits...

Register the provider in the app.php file:

```php
AshleighSims\GetAddressWrapper\Laravel\GetAddressWrapperServiceProvider::class
```

Optionally register the Facade:

```php
'GetAddress' => AshleighSims\GetAddressWrapper\Laravel\GetAddressWrapperServiceProvider::class
```

Please ensure you've added the below environment variables to your `.env` file before starting.

#### Environment Variables
Add the following environment variables to your .env file.

```dotenv
GET_ADDRESS_BASE_URL="https://api.getaddress.io"
GET_ADDRESS_API_KEY=""
GET_ADDRESS_ADMINISTRATION_API_KEY=""
GOOGLE_PLACES_API_KEY=""
```

## Usage

### Laravel 

#### Dependency Injection Via Controller
```php
use AshleighSims\GetAddressWrapper\GetAddressWrapper;
...

private $getAddress;

public function __construct(GetAddressWrapper $getAddress) {
    $this->getAddress = $getAddress;
}

public function getPostcodeAddressList() {
    $response = $this->getAddress->findByPostcode()->find('SW1A 1AA');
}

...
```

#### Facade
```php
use AshleighSims\GetAddressWrapper\Laravel\Facades\GetAddressWrapper;

...

public function getAddress() {
    $response = GetAddressWrapper::findByPostcode()->find('SW1A 1AA');
}

...
```

### General Usage

#### Find

##### List of addresses from postcode

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->findByPostcode()->find('SW1A 1AA');
```

Return: Array of AshleighSims\GetAddressWrapper\Response\Address Objects

##### Address from postcode and building number

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->findByPostcode()->findWithNumber('SW1A 1AA', 'Buckingham Palace');
```

Return: Object AshleighSims\GetAddressWrapper\Response\Address

#### Distance

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->distance()->between('SW1A 1AA', 'SL4 1QF');
```

Return: Object AshleighSims\GetAddressWrapper\Response\Distance

#### Autocomplete - Postcodes

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->autoCompletePostcode()->complete('SW1A');
```

Return: Object AshleighSims\GetAddressWrapper\Response\GooglePlacesPostcodePrediction

#### Autocomplete - Places

##### Places

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->>autoCompletePlaces()->complete('Buckingham');
```

Return: Array of AshleighSims\GetAddressWrapper\Response\GooglePlacesPrediction Objects

##### Place Details

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->autoCompletePlaces()->findByGooglePlacesId('ChIJtV5bzSAFdkgRpwLZFPWrJgo');
```

Return: Object AshleighSims\GetAddressWrapper\Response\GooglePlace

#### Usage

##### Current day

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->usage()->get();
```

Return: Object AshleighSims\GetAddressWrapper\Response\Usage

##### Given date

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->usage()->getByDate('18/02/2020', 'd/m/Y');
```

Return: Object AshleighSims\GetAddressWrapper\Response\Usage

##### Date range

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->usage()->getBetween('18/02/2020', '19/02/2020', 'd/m/Y');
```

Return: Array of AshleighSims\GetAddressWrapper\Response\DailyUsage Objects

#### Private Address List

##### Add address

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->privateAddress()->add('SW1A 1AA', [
                                     'line1' => 'Ashleigh\'s Palace',
                                     'line2' => '',
                                     'line3' => '',
                                     'line4' => '',
                                     'locality' => '',
                                     'townOrCity' => 'London',
                                     'county' => '',
                                 ]);
```

Return: JSON decoded associative array

##### Delete address

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->privateAddress()->delete('SW1A 1AA', '1');
```

Return: JSON decoded associative array

##### Get address

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->privateAddress()->get('SW1A 1AA', '1');
```

Return: Object AshleighSims\GetAddressWrapper\Response\PrivateAddress

##### List addresses

```php
$getAddress = new GetAddressWrapper('api-key', 'admin-api-key', 'google-places-api-key', 'https://api.getAddress.io');
$response = $getAddress->privateAddress()->list('SW1A 1AA');
```

Return: Array of AshleighSims\GetAddressWrapper\Response\PrivateAddress Objects

## Change log

Please see the [changelog](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email sims@ashleighsims.co.uk instead of using the issue tracker.

## License

license. Please see the [license file](LICENSE.md) for more information.
