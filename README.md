# Mapon API PHP SDK

PHP Library to help working with Mapon API.

### Setup


Add this package to your project with composer

```
composer require mapon-com/client-api-php-sdk
```

### Usage

To call API methods use:
```php
MaponApi::get()
```
or for POST requests:
```php
MaponApi::post()
```

To decode encoded route data retunred by route/list use:
```php
MaponApi::decodePolyline()
```

Input parameters are documented as phpdoc comments in the [MaponApi.php]

## Examples 

[unit/list example]

[unit/list example]: /examples/unit/list.php
[MaponApi.php]: /src/Mapon/MaponApi.php