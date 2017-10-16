<?php

/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 12.10.2017
 * Time: 15:57
 */
class Gantt
{
    private $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function draw($max)
    {
        $chart = '<h2>GANTT CHART</h2>';
        foreach ($this->collection as $item) {
            $chart .= '<div style="padding-bottom: 10px; width:' . (60 * ($max + 1)) . 'px; clear:both; ">'; // Processor block
            $chart .= '<div style="display:flex; align-items:center; justify-content:center; background: #e5e8e8; color: #333; float:left; width:50px; height:50px; border: 1px solid #333;">' . $item->getName() . '</div>'; //Processor name
            foreach ($item->getTasks() as $task) {
                $chart .= '<div style="display:flex; align-items:center; justify-content:center; float:left; width:' . (50 * $task['time']) . 'px; height:50px; border: 1px solid #333;">' . $task['task']->getId() . '</div>'; // Tasks in processor
            }
            $chart .= '</div>'; // Close processor block
        }
        echo $chart;
    }
}