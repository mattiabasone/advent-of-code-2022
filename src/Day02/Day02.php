<?php

namespace Mattiabasone\AdventOfCode2022\Day02;

use Mattiabasone\AdventOfCode2022\Run;

final class Day02
{
    use Run;

    public static function partOne(array $data): int
    {
        $opponentScore = 0;
        $playerScore = 0;
        foreach ($data as $match) {
            $opponentPlay = Play::fromInput($match[0]);
            $playerPlay = Play::fromInput($match[1]);

            $matchScore = self::matchScore($opponentPlay, $playerPlay);

            $opponentScore += $opponentPlay->getScore() + $matchScore[0];
            $playerScore += $playerPlay->getScore() + $matchScore[1];
        }

        return $playerScore;
    }

    public static function matchScore(Play $opponentPlay, Play $playerPlay): array
    {
        $opponentScore = $opponentPlay->getScore();
        $playerScore = $playerPlay->getScore();
        if ($opponentScore === $playerScore) {
            return [3, 3];
        }

        $totalScore = $opponentScore + $playerScore;
        $winningScore = match ($totalScore) {
            3 => 2,
            4 => 1,
            5 => 3
        };

        return $opponentScore === $winningScore ? [6, 0] : [0, 6];
    }

    public static function partTwo(array $data): int
    {
        $playerScore = 0;
        foreach ($data as $match) {
            $opponentPlay = Play::fromInput($match[0]);

            $playerScore += match ($match[1]) {
                'X' => $opponentPlay->winsOn()->getScore(),
                'Y' => $opponentPlay->getScore() + 3,
                'Z' => $opponentPlay->losesOn()->getScore() + 6,
            };
        }

        return $playerScore;
    }

    public static function prepareData(string $input): array
    {
        $exploded = explode("\n", $input);
        return array_map(
            fn ($lines) => explode(" ", $lines), $exploded
        );
    }
}
