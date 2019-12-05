<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FormBuilder as FormBuilder;

class FormsServiceProvider extends ServiceProvider {

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('formbuilder', function($app) {
            return new FormBuilder();
        });
    }

}
