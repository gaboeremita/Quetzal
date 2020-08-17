<?php

namespace gaboeremita\quetzal\Facades;

use Illuminate\Support\Facades\Facade;

class Quetzal extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'quetzal';
    }
}
