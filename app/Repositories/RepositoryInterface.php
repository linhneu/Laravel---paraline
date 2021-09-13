<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function paginate();

    public function find($id);

    public function findByField($earch);

    public function create(array $data);

    public function update($id, array $data,);

    public function delete($id, array $data);

}