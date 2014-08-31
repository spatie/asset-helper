Get the url to a revisioned asset
=======
[![Latest Stable Version](https://poser.pugx.org/spatie/asset-helper/version.png)](https://packagist.org/packages/spatie/asset-helper)
[![License](https://poser.pugx.org/spatie/asset-helper/license.png)](https://packagist.org/packages/spatie/asset-helper)

This Laravel 4 package enables you to get an url to a revisioned asset.

That sounds a bit vague, right? Let me clear it up by showing an example.
Calling this provided method `Asset::getUrl('admin.css')` returns `/assets/admin.0ce5cb43.css`

This package assumes that your asset pipeline:
- saves all of your assets in one public folder. 
- puts a random string in the filename of every asset as a cache-busting mechanism


##Installation
The package can be installed through Composer:

```js
{
    "require": {
		"spatie/asset-helper": "dev-master"
	}
}
```

This service provider must be installed:

```php

//for laravel <=4.2: app/config/app.php

'providers' => [
    ...
    'Spatie\AssetHelper\AssetHelperServiceProvider'
    ...
];
```

This package also comes with a facade, which provides an easy way to call the the functionality.


```php

//for laravel <=4.2: app/config/app.php

'aliases' => array(
	...
	'Asset' => 'Spatie\AssetHelper\AssetHelperFacade',
	...
)
```


##Configuration
You can publish the configuration file using this command:
```console
php artisan config:publish spatie/asset-helper
```

A configuration-file with some sensible defaults will be placed in your config/packages directory:

```php
return
    [
        /**
         * The url that points to the directory were your assets are stored
         *
         */
        'assetDirectoryUrl'         =>  '/assets',
    ];
```


##Usage
```Asset::getUrl($nonRevisionedAssetName)``` takes a non-revisioned asset name and it returns the url to the revisioned asset.


##Example
Let's assume the public path of your website is `/home/forge/yourwebsite.be/public` and that your asset pipeline stores the minified, uglified, ... and whatnot assets in this directory: `/home/forge/yourwebsite.be/public/assets`

Suppose this is the contents of that directory:
- admin.0ce5cb43.css
- admin.defer.adc60631.js
- admin.head.1954b61c.js
- front.0b4c09c7.css
- front.defer.1ba6b072.js
- front.head.1954b61c.js

As a cache-busting mechanism your asset pipeline probably puts a random string in the filename of the asset. In the example above this is '0ce5cb43', 'adc60631', '1954b61c.js', ...

Calling `Asset::getUrl('admin.css')` returns `/assets/admin.0ce5cb43.css`

So your layout file could look something like this:

```html+php
<!DOCTYPE html>

<head>
    ... 
    <script type="text/javascript" src="<?= Asset::getUrl('front.head.js') ?>"></script>
    <link rel="stylesheet" href="<?= Asset::getUrl('front.css') ?>" type="text/css" media="screen"/>
    ...
</head>
<body>
    ...
    <script type="text/javascript" src="<?= Asset::getUrl('front.defer.js') ?>"></script>
</body>
</html>
```























 









