<?php

namespace App\Providers;

use App\Services\WikiService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WikiService::class, function ($app) {
            return new WikiService(config('wiki'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('datetime', function ($carbon) {
            return "<?php echo ($carbon)->isoFormat('LL'); ?>";
        });
    }
}
