<?php

/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 12.10.2017
 * Time: 18:15
 */
class Processor
{
    private $id;
    private $name;
    private $tasks = array();


    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addTasks($obj, $time)
    {
        $this->tasks[] = array(
            'task' => $obj,
            'time' => $time
        );
    }

    public function getTasks()
    {
        return $this->tasks;
    }
}