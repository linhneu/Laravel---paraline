<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\TeamModel::class;
    }
    public function deleteTeamByGroupId($group_id, $data = [])
    {
        if ($group_id) {
            return $this->_model->where('group_id', '=', $group_id)->update($data);
        }
        return false;
    }
}
