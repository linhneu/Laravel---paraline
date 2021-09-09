<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class GroupRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\EmployeeModel::class;
    }
    
}