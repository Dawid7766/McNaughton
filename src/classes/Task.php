<?php

/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 12.10.2017
 * Time: 15:56
 */
class Task
{
    private $id;
    private $time = 0;

    public function __construct($id, $time)
    {
        $this->id = $id;
        $this->time = $time;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getId()
    {
        return $this->id;
    }
}