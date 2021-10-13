<?php

namespace ctocode\facade;

use think\Facade;

class CtoLogFile extends Facade
{
    protected static function getFacadeClass()
    {
        return 'ctocode\library\CtoLogFile';
    }
}
