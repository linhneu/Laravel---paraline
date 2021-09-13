<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\EmployeeModel::class;
    }
    
}