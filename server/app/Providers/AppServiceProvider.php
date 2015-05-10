<?php namespace App\Providers;

use App\Http\Transformers\Serializers\ApiSerializer;
use Illuminate\Support\ServiceProvider;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Serializer\JsonApiSerializer;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'App\Services\Registrar'
        );

        // Change the API serializer
        $this->app->bind('League\Fractal\Serializer\SerializerAbstract', ApiSerializer::class);
    }
}
