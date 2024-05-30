<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::fake([
            'https://yourdomain.com/deposit' => Http::response([
                'status' => 1,
            ], 200, ['Headers']),
        ]);

        Http::fake([
            'https://yourdomain.com/withdrawal' => Http::response([
                'status' => 1,
            ], 200, ['Headers']),
        ]);

        Blade::directive('money', function ($amount) {
            return "<?php echo money_format($amount); ?>";
        });
    }
}
