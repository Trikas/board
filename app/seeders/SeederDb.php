<?php

namespace App\seeders;

use App\Helpers\Properties;
use App\models\Csm;
use App\models\Csmb;
use App\models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Collection;

class SeederDb
{
    private $names;
    const BOARD_CSM = 'csm';
    const BOARD_CSMB = 'csmb';

    public function __construct()
    {
        $this->names = [
            'Иванов' => 'Иван',
            'Иванов1' => 'Иван',
            'Иванов2' => 'Иван',
            'Иванов3' => 'Иван',
            'Иванов4' => 'Иван',
            'Иванов5' => 'Иван',
            'Иванов6' => 'Иван',
            'Иванов7' => 'Иван',
            'Иванов8' => 'Иван',
            'Иванов9' => 'Иван',
            'Иванов10' => 'Иван',
            'Иванов11' => 'Иван',
            'Иванов12' => 'Иван',
            'Иванов13' => 'Иван',
            'Иванов14' => 'Иван',
            'Иванов15' => 'Иван',
            'Иванов16' => 'Иван',
            'Иванов17' => 'Иван',
            'Иванов18' => 'Иван',
            'Иванов19' => 'Иван',
        ];
    }

    /**
     * @return Collection
     */
    private function seedUsers(): Collection
    {
        foreach ($this->names as $key => $value) {
            User::create([
                'first_name' => $key,
                'last_name' => $value . rand(1, 30)
            ]);
        }
        return User::all();
    }

    /**
     * @param $users
     */
    private function seedCsmb($users)
    {
        $this->factory($users, self::BOARD_CSMB);
    }

    /**
     * @param $users
     */
    private function seedCsm($users)
    {
        $this->factory($users, self::BOARD_CSM);
    }

    /**
     * @param $userId
     * @param $grade
     */
    private function createRowCsmb($userId, $grade)
    {
        Csmb::create([
            'user_id' => $userId,
            'grade' => $grade
        ]);
    }

    /**
     * @param $userId
     * @param $grade
     */
    private function createRowCsm($userId, $grade)
    {
        Csm::create([
            'user_id' => $userId,
            'grade' => $grade
        ]);
    }

    /**
     * @param $users
     * @param $board
     */
    private function factory($users, $board)
    {
        $users->each(function ($item, $key) use ($board) {
            for ($x = 1; $x <= 4; $x++) {
                $isCreating = rand(0, 1);
                if ($board == 'csm')
                    $isCreating ? $this->createRowCsm($item->id, rand(0, 12)) : false;
                elseif ($board == 'csmb')
                    $isCreating ? $this->createRowCsmb($item->id, rand(0, 12)) : false;
            }
        });
    }

    public function initSeeder()
    {
        $users = $this->seedUsers();
        $this->seedCsm($users);
        $this->seedCsmb($users);
    }
}