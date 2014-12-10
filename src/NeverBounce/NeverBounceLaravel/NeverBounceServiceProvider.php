<?php namespace NeverBounce\NeverBounceLaravel;

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

		NB_Auth::auth(
			(isset($_ENV['neverbounce.secretKey'])) ? $_ENV['neverbounce.secretKey'] : null,
			(isset($_ENV['neverbounce.appID'])) ? $_ENV['neverbounce.appID'] : null
		);

		if(isset($_ENV['neverbounce.api'])) {
			NB_Auth::setAPI($_ENV['neverbounce.api']);
		}

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
