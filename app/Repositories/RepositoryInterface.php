<?php


namespace App\Repositories;


interface RepositoryInterface
{
    public function getModelClass();

    public function all($columns = array('*'));

    public function paginate($perPage, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));
}