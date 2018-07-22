<?php
namespace App\Repository;

use \Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model = null;

    public function __construct()
    {
        $this->setModel();
    }

    private function setModel()
    {
        $this->model = $this->getModel();
    }

    protected abstract function getModel() :Model;

    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute="id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($field, $value, $columns = array('*'))
    {

    }

    public function addParam($query, $column, $value, $operator = '=')
    {
        return $query->where($column, $operator, $value);
    }
}