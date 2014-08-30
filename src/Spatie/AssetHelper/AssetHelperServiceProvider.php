<?php namespace Spatie\AssetHelper;

use Illuminate\Support\ServiceProvider;

class AssetHelperServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('spatie/asset-helper');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('assetHelper', 'Spatie\AssetHelper\AssetHelper');
	}

}
