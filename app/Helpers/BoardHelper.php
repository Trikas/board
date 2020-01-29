<?php


namespace App\Helpers;


use App\controllers\Board;

class BoardHelper
{
    public static function selectGrades($grades): array
    {
        $gradesCollect = [];
        foreach ($grades as $grade) {
            $gradesCollect[] = $grade->grade;
        }

        return $gradesCollect;
    }

    public static function updateUserBoardResult(string $boardResultName, bool $status, $user)
    {
        $user->update([
            $boardResultName => $status
        ]);
    }

    public static function bootBoard($grades, $boardName, $user)
    {
        $board = new Board($grades);
        $collectGrades = $board->getGrades();
        $boardName == 'csm' ? $board->isPassGradeCsm($collectGrades, $user) : $board->isPassGradeCsmb($collectGrades, $user);
    }

    public static function startCsmbBoard($collectGrades)
    {
        $minGrade = $collectGrades->min();
        $keyMinGrade = $collectGrades->search($minGrade);
        $collectGrades->forget($keyMinGrade);
        $maxGrade = $collectGrades->search(function ($item, $key) {
            return $item > 8;
        });

        return $maxGrade;
    }
}