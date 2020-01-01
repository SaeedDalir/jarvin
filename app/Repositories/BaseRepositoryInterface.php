<?php namespace App\Repositories;

interface BaseRepositoryInterface
{
    /* This interface only provides the standard functions to be expected of ALL eloquent repositories */

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'));

    /**
     * @param array $array
     * @return mixed
     */
    public function create(array $array);

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute= 'id');

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'));





//    /**
//     * @param array $data
//     * @return mixed
//     */
//    public function insert(array $data);
//
//    /**
//     * @param int $count
//     * @return mixed
//     */
//    public function take(int $count = 20);
//
//    /**
//     * @param $column
//     * @param $value
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstByField($column, $value, $columns = ['*']);
//
//    /**
//     * @param $column
//     * @param $value
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstOrFailByField($column, $value, $columns = ['*']);
//
//    /**
//     * @param array $where
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstWhere(array $where, $columns = ['*']);
//
//    /**
//     * @param array $where
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstOrFailWhere(array $where, $columns = ['*']);
//
//    /**
//     * @param $column
//     * @param array $values
//     * @return mixed
//     */
//    public function deleteWhereIn($column, array $values);
//
//    /**
//     * @param array $where
//     * @param array $columns
//     * @return mixed
//     */
//    public function deleteWhere(array $where, $columns = ['*']);
//
//    /**
//     * @param Model $model
//     * @param array $array
//     */
//    public function updateModel(Model $model, array $array): void;
//
//
//    /**
//     * @param array $where
//     */
//    public function applyConditions(array $where): void;
}
