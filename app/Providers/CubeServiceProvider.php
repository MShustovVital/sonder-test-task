<?php

namespace App\Providers;

use App\Models\Cube;
use App\Services\Cube\CubeService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class CubeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(CubeService::class)
            ->needs(Model::class)
            ->give(Cube::class);
    }
}
