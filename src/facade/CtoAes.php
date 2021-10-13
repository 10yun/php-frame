<?php

namespace ctocode\facade;

use think\Facade;

class CtoAes extends Facade
{
    protected static function getFacadeClass()
    {
        return 'ctocode\library\CtoAes';
    }
}
