<?php


namespace App\controllers;


use App\Helpers\BoardHelper;
use App\models\Csm;
use Illuminate\Database\Eloquent\Collection;

class BoardCsm
{
    private $grades;

    public function __construct(Collection $grades)
    {
        $this->grades = $grades;
    }

    public function getCsmGrades()
    {
        $gradesCollect = BoardHelper::selectGrades($this->grades);
        return collect($gradesCollect);
    }

    public function isPassGradeCsm($collectGrades)
    {

    }
}