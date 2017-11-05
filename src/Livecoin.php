<?php

namespace Dvomaks\Livecoin;

use Illuminate\Support\Facades\Facade;

class Livecoin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'livecoin';
    }
}