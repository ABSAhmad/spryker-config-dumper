<?php

declare(strict_types = 1);

namespace Cariboui\Shared\ConfigDump;

use ArrayObject;
use Spryker\Shared\Config\Config as SprykerConfig;

class Config extends SprykerConfig
{
    /**
     * @return \ArrayObject|null
     */
    public static function getConfig(): ?ArrayObject
    {
        return static::$config;
    }
}
