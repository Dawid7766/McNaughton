<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 12.10.2017
 * Time: 16:00
 */

function __autoload($class_name)
{
    include_once 'classes/' . $class_name . '.php';
}

