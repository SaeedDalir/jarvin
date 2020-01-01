<?php namespace App\Providers;

use App\Repositories\Eloquent\BaseRepositoryAbstract;
use App\Repositories\Eloquent\User\UserRepository;
use App\Repositories\Eloquent\User\UserRepositoryInterface;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
