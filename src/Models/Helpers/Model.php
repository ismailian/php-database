<?php

namespace PhpDatabase\Models\Helpers;

use PhpDatabase\Database;
use PhpDatabase\Models\Helpers\Eloquent;

/**
 * the parent class Model
 */
class Model
{
    use Eloquent;
    use Mapper;

    public static $type = '';
    public static $table = '';
    public static $attributes = [];
}
