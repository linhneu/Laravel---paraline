<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class TeamRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\TeamModel::class;
    }   
}