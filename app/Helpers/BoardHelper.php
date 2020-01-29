<?php


namespace App\Helpers;


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
}