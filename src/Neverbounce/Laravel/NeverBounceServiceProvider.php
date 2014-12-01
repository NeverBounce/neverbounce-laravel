<?php namespace NeverBounce\Laravel;

use Illuminate\Support\ServiceProvider;
use NeverBounce\API\NB_Auth;

class NeverBounceServiceProvider extends ServiceProvider {

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
		$this->package('neverbounce/neverbounce-laravel');

		NB_Auth::auth($_ENV['neverbounce.secretKey'], $_ENV['neverbounce.appID']);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
