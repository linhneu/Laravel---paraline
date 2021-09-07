<?php
namespace App\Repositories;

use Illuminate\Console\Application;

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
        return $this->_model->all();
    }
    public function find($id)
    {
        $result = $this->_model->find($id);
        return $result;
    }
    public function create(array $data)
    {
        return $this->_model->create($data);
    }
    public function update($id, array $data)
    {
        $result = $this->find($id);
        if($result) {
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
    public function paginate($limit, $data)
    {

    }
}
