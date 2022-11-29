<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Setting;
use App\Repositories\Eloquent\EloquentEmployeeRepository;
use App\Repositories\Eloquent\EloquentOvertimeRepository;
use App\Repositories\Eloquent\EloquentSettingRepository;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\OvertimeRepository;
use App\Repositories\Interfaces\SettingRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Repository
         */
        // $this->app->bind();

        /**
         * Repository Setting
         */
        $this->app->bind(
            SettingRepository::class,
            function(){
                $repository = new EloquentSettingRepository(new Setting());
                return $repository;
            }
        );
        /**
         * Repository Employee
         */
        $this->app->bind(
            EmployeeRepository::class,
            function(){
                $repository = new EloquentEmployeeRepository(new Employee());
                return $repository;
            }
        );
        /**
         * Repository Overtime
         */
        $this->app->bind(
            OvertimeRepository::class,
            function(){
                $repository = new EloquentOvertimeRepository(new Overtime());
                return $repository;
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
