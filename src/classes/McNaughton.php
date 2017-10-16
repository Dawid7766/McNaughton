<?php

/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 13.10.2017
 * Time: 00:17
 */
class McNaughton
{
    private $tasks;
    private $processors;

    public function __construct($tasks, $processors)
    {
        $this->tasks = $tasks;
        $this->processors = $processors;
    }


    /**
     * Calculate CMAX
     */

    public function getCmax()
    {
        $totalTime = 0;
        $maxTime = 0;
        foreach ($this->tasks as $task) {
            $totalTime += $task->getTime();
            if ($task->getTime() > $maxTime)
                $maxTime = $task->getTime();
        }
        $totalTime = $totalTime / $this->processorsNo();
        if ($totalTime > $maxTime)
            return ceil($totalTime);
        else
            return ceil($maxTime);
    }

    /**
     * Task Scheduling
     */

    public function schedule()
    {
        $cmax = $this->getCmax();
        $tempCmax = $cmax;
        $processor = 0;
        foreach ($this->tasks as $task):
            $taskTime = $task->getTime();
            while ($taskTime > 0):
                if ($taskTime <= $tempCmax):
                    $this->processors[$processor]->addTasks($task, $taskTime);
                    $tempCmax = $tempCmax - $taskTime;
                    if ($tempCmax <= 0) {
                        $processor++;
                        $tempCmax = $cmax;
                    }
                    $taskTime = 0;
                else:
                    $taskTime = $taskTime - $tempCmax;
                    $this->processors[$processor]->addTasks($task, $tempCmax);
                    if ($taskTime != 0 && $processor + 1 > 2)
                        echo 'ERROR, NO SLOTS IN PROCESSORS!';
                    else
                        $processor++;
                    $tempCmax = $cmax;
                endif;
            endwhile;
        endforeach;
    }

    /**
     * DISLAY RECORDS
     */

    public function result()
    {
        $display = '<h2>RESULT OF SCHEDULE</h2>';
        foreach ($this->processors as $processor) {
            $display .= '<strong>PROCESSOR: ' . $processor->getId() . '</strong><br>';
            foreach ($processor->getTasks() as $item)
                $display .= 'Task: ' . $item['task']->getId() . ' Time: ' . $item['time'] . '<br>';
        }
        $display .= '<br>';
        echo $display;
    }

    /**
     * Count processors
     */

    private function processorsNo()
    {
        return count($this->processors);
    }
}