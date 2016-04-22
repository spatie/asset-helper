<?php

namespace Spatie\AssetHelper;

use Illuminate\Support\Facades\Facade;

class AssetHelperFacade extends Facade
{
    /**
     * @see \Spatie\AssetHelper\AssetHelper
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'asset-helper';
    }
}
