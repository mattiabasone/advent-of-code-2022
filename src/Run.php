<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022;

trait Run
{
    public function run(): string
    {
        $rawData = static::input();

        $partOneTimer = (new Timer())->start();
        $partOne = static::partOne(
            static::prepareData($rawData)
        );
        $partOneElapsedSeconds = $partOneTimer->stop()->elapsedSeconds();

        $partTwoTimer = (new Timer())->start();
        $partTwo = static::partTwo(
            static::prepareData($rawData)
        );
        $partTwoElapsedSeconds = $partTwoTimer->stop()->elapsedSeconds();

        return
            <<<RESULT
            Part one: $partOne ($partOneElapsedSeconds seconds)
            Part two: $partTwo ($partTwoElapsedSeconds seconds)
            
            RESULT;

    }

    public static function input(): string
    {
        $classNamespace = explode("\\", __CLASS__);
        $inputName = strtolower(end($classNamespace));
        return file_get_contents(__DIR__."/../inputs/{$inputName}.txt");
    }
}