<?php namespace Spatie\AssetHelper;

use Illuminate\Support\Facades\Facade;

class AssetHelperFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'assetHelper';
    }

}