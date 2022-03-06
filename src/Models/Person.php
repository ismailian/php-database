<?php

namespace PhpDatabase\Models;

use PhpDatabase\Models\Helpers\Model;

class Person extends Model
{
    public static $type = Person::class;
    public static $table = 'persons';
    public static $attributes = ['name', 'age'];
}
