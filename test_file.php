<?php

use HseEvents\Database\Connection;
use HseEvents\Model\Model;
use HseEvents\Model\Student;

require_once './vendor/autoload.php';

$a = ["first"=>"1", "second"=>"2"];

echo(in_array("1", $a));