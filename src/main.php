<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 12.10.2017
 * Time: 16:51
 */


/**
 * Initial Tasks
 */

$collection = array();

$collection[] = new Task(1, 1);
$collection[] = new Task(2, 5);
$collection[] = new Task(3, 6);
$collection[] = new Task(4, 4);
$collection[] = new Task(5, 2);
$collection[] = new Task(6, 4);
$collection[] = new Task(7, 7);
$collection[] = new Task(8, 20);
$collection[] = new Task(9, 10);

/**
 * Initial Processors
 */

$processors = array();

$processors[] = new Processor(1, 'M1');
$processors[] = new Processor(2, 'M2');
$processors[] = new Processor(3, 'M3');

/**
 * Initial McNaughton Algorithm
 */

$algorithm = new McNaughton($collection, $processors);
$algorithm->schedule();
$algorithm->result();

/**
 * Initial Gantt Chart
 */

$chart = new Gantt($processors);
$chart->draw($algorithm->getCmax());