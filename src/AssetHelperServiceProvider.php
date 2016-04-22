<?php namespace Spatie\AssetHelper;

use Illuminate\Support\ServiceProvider;

class AssetHelperServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/asset-helper.php', 'asset-helper');

		$this->publishes([
			__DIR__.'/../config/asset-helper.php' => config_path('asset-helper.php'),
		], 'config');
	}

	public function register()
	{
		$this->app->bind(AssetHelper::class);
		$this->app->alias(AssetHelper::class, 'asset-helper');
	}

}
