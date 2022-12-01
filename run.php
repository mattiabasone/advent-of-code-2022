<?php

require_once 'vendor/autoload.php';

$day = $argv[1] ?? null;

if (is_null($day)) {
    echo "usage: php run.php 01";
    exit(1);
}


$class = "\Mattiabasone\AdventOfCode2022\Day{$day}\Day{$day}";

echo (new $class)->run();