<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class FormsFacade extends Facade {

    public static function getFacadeAccessor() {
        return 'formbuilder';
    }

}
