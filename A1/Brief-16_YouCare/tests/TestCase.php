<?php

namespace Tests;

use App\Models\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function withMiddleware($middleware = null): \Illuminate\Foundation\Application|TestCase
    {
        $this->app->instance(Application::class, $this->app);

        $this->app->withoutMiddleware([
            \App\Http\Middleware\VerifyCsrfToken::class,
        ]);

        return $this->app;
    }
}
