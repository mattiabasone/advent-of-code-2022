<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022;

trait Run
{
    protected array $timers = [];

    abstract public static function prepareData(string $input): array;
    abstract public static function partOne(array $data);
    abstract public static function partTwo(array $data);

    public function run(): string
    {
        $rawData = static::input();

        $this->startTimer('partOne');
        $partOne = static::partOne(
            static::prepareData($rawData)
        );
        $this->stopTimer('partOne');
        $partOneElapsedSeconds = $this->elapsedSeconds('partOne');

        $this->startTimer('partTwo');
        $partTwo = static::partTwo(
            static::prepareData($rawData)
        );
        $this->stopTimer('partTwo');
        $partTwoElapsedSeconds = $this->elapsedSeconds('partTwo');

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

    protected function startTimer(string $timerName): void
    {
        $this->timers[$timerName] = [
            'start' => hrtime(true),
            'end' => -1
        ];
    }

    protected function stopTimer(string $timerName): void
    {
        $this->timers[$timerName]['end'] = hrtime(true);
    }

    protected function elapsedSeconds(string $timerName): string
    {
        return number_format(($this->timers[$timerName]['end'] - $this->timers[$timerName]['start']) / 1e+9, 8);
    }
}