<?php

namespace App\Providers;

use App\Models\Note;
use App\Observes\NoteObserve;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
		$this->registerObserves();
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		if ( $this->app->environment() !== 'production' ) {
			$this->app->register( \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class );
		}

	}

	private function registerObserves() {
		Note::observe( NoteObserve::class );
	}
}
