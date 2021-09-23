<?php

namespace App\Repositories;

use Illuminate\Console\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }
    abstract public function getModel();
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }
    public function all()
    {
        //return $this->_model->where('del_flag', '=', DEL_FLAG_ACTIVE);
    }
    public function find($id)
    {
        $result = $this->_model->find($id);
        return $result;
    }
    public function create(array $data)
    {
        $data['ins_id'] = Auth::user()->id;
        $data['del_flag'] = DEL_FLAG_ACTIVE;
        return $this->_model->create($data);
    }
    public function update($id, array $data)
    {
        $data['upd_id'] = Auth::user()->id;
        $data['del_flag'] = DEL_FLAG_ACTIVE;
        $result = $this->find($id);
        if ($result) {
            $result->update($data);
            return $result;
        }
        return false;
    }
    public function delete($id, $data)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($data);
            return true;
        }
        return false;
    }
    public function paginate()
    {
        //return $this->_model->where('del_flag', '=', DEL_FLAG_ACTIVE)->paginate(5);
    }
    public function findByField($search)
    {
        $result = $this->_model->where([
            ['name', 'like', '%' . "$search". '%'],
            ['del_flag', '=', DEL_FLAG_ACTIVE]
        ]);
        return $result;
    }
}
