<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022;

final class Timer
{
    private int $start;
    private int $end;

    public function start(): self
    {
        $this->start = hrtime(true);

        return $this;
    }

    public function stop(): self
    {
        $this->end = hrtime(true);

        return $this;
    }

    public function elapsedSeconds(): string
    {
        return number_format(($this->end - $this->start) / 1e+9, 8);
    }
}
