<?php
namespace App\Repositories;

use Illuminate\Console\Application;
use Illuminate\Support\Facades\Auth;

define('DEL_FLAG_ACTIVE', 0);
abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct( )
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
        //$condition = Scope::active()->orderBy('id')->get();
        return $this->_model->where('del_flag', DEL_FLAG_ACTIVE)->get();
    }
    public function find($id)
    {
        //$condition = Scope::search('keyword')->get();
        $result = $this->_model->find($id);
        return $result;
    }
    public function create(array $data)
    {
        $data['ins_id'] = 1 ;
        $data['upd_id'] = 1;
        $data['del_flag'] = DEL_FLAG_ACTIVE;
        return $this->_model->create($data);
    }
    public function update($id, array $data)
    {
        $data['ins_id'] = 1 ;
        $data['upd_id'] = 1;
        $data['del_flag'] = DEL_FLAG_ACTIVE;
        $result = $this->find($id);
        if($result) {
            $result->update($data);
            return $result;
        }
        return false;
    }
    public function delete($id, $data)
    {
        $data['del_flag'] = 1;
        $result = $this->find($id);
        if ($result) {
            $result->update($data);
            return true;
        }
        return false;
    }
    public function paginate($limit, $data)
    {

    }
}
