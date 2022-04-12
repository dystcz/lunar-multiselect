<?php

namespace Dystcz\GetcandyMultiselect;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dystcz\GetcandyMultiselect\Skeleton\SkeletonClass
 */
class GetcandyMultiselectFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ' getcandy-multiselect';
    }
}
