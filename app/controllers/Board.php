<?php


namespace App\controllers;


use App\Helpers\BoardHelper;
use App\models\Csm;
use Illuminate\Database\Eloquent\Collection;

class Board
{
    private $grades;
    const PASS_NUMBER = 7;
    const CONFIRM_BOARD = true;
    const UNCONFIRM_BOARD = false;
    const BOARD_RESULT_CSM = 'csm_result';
    const BOARD_RESULT_CSMB = 'csmb_result';

    public function __construct(Collection $grades)
    {
        $this->grades = $grades;
    }

    public function getGrades()
    {
        $gradesCollect = BoardHelper::selectGrades($this->grades);
        return collect($gradesCollect);
    }

    public function isPassGradeCsm($collectGrades, $user)
    {
        if ($collectGrades->avg() >= self::PASS_NUMBER) {
            self::updateResultBoard($user, self::CONFIRM_BOARD, self::BOARD_RESULT_CSM);
        } else {
            self::updateResultBoard($user, self::UNCONFIRM_BOARD, self::BOARD_RESULT_CSM);
        }
    }

    public function isPassGradeCsmb($collectGrades, $user)
    {
        if ($collectGrades->count() > 2){
            $maxGrade = BoardHelper::startCsmbBoard($collectGrades);
            if($maxGrade){
                self::updateResultBoard($user, self::CONFIRM_BOARD, self::BOARD_RESULT_CSMB);
            }else{
                self::updateResultBoard($user, self::UNCONFIRM_BOARD, self::BOARD_RESULT_CSMB);
            }
        }else{
            self::updateResultBoard($user, self::UNCONFIRM_BOARD, self::BOARD_RESULT_CSMB);
        }
    }

    public static function updateResultBoard($user, $status, $board)
    {
        BoardHelper::updateUserBoardResult(
            $board,
            $status,
            $user
        );
    }
}