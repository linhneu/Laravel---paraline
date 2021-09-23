<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\EmployeeModel::class;
    }
    public function findByField($search)
    {
        $result = $this->_model->where([
            ['last_name', 'like', '%' . "$search" . '%'],
            ['del_flag', '=', DEL_FLAG_ACTIVE]
        ]);
        return $result;
    }
    public function deleteEmployeeByTeamId($team_id, $data)
    {
        if ($team_id) {
            return $this->_model->where('team_id', '=', $team_id)->update($data);
        }
        return false;
    }
}
