<?php namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Eloquent\Criteria\CriteriaAbstract;
use App\Repositories\Eloquent\Criteria\CriteriaInterface;

abstract class BaseRepositoryAbstract implements BaseRepositoryInterface,CriteriaInterface
{
    /* This class only implements the standard functions to be expected of ALL eloquent repositories */

    protected $model;
    protected $criteria;
    protected $skipCriteria = false;

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        $this->applyCriteria();
        return $this->model->get($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function create(array $array)
    {
        $this->applyCriteria();
        return $this->model->create($array);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute= 'id') {
        $this->applyCriteria();
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        $this->applyCriteria();
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true){
        $this->skipCriteria = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCriteria() {
        return $this->criteria;
    }

    /**
     * @param CriteriaAbstract $criteria
     * @return $this
     */
    public function getByCriteria(CriteriaAbstract $criteria) {
        $this->model = $criteria->apply($this->model, $this);
        return $this;
    }

    /**
     * @param CriteriaAbstract $criteria
     * @return $this
     */
    public function pushCriteria(CriteriaAbstract $criteria) {
        $this->criteria->push($criteria);
        return $this;
    }

    /**
     * @return $this
     */
    public function  applyCriteria() {
        if($this->skipCriteria === true)
            return $this;

        foreach($this->getCriteria() as $criteria) {
            if($criteria instanceof CriteriaAbstract)
                $this->model = $criteria->apply($this->model, $this);
        }

        return $this;
    }





//    /**
//     * @param array $data
//     * @return mixed
//     */
//    public function insert(array $data)
//    {
//        return $this->model->insert($data);
//    }
//
//    /**
//     * @param int $count
//     * @return mixed
//     */
//    public function take(int $count = 20)
//    {
//        return $this->model->take($count)->get();
//    }
//
//    /**
//     * @param $column
//     * @param $value
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstByField($column, $value, $columns = ['*'])
//    {
//        return $this->model->where($column, $value)->first($columns);
//    }
//
//    /**
//     * @param $column
//     * @param $value
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstOrFailByField($column, $value, $columns = ['*'])
//    {
//        return $this->model->where($column, $value)->firstOrFail($columns);
//    }
//
//    /**
//     * @param array $where
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstWhere(array $where, $columns = ['*'])
//    {
//        $this->applyConditions($where);
//        return $this->model->first($columns);
//    }
//
//    /**
//     * @param array $where
//     * @param array $columns
//     * @return mixed
//     */
//    public function firstOrFailWhere(array $where, $columns = ['*'])
//    {
//        $this->applyConditions($where);
//        return $this->model->firstOrFail($columns);
//    }
//
//    /**
//     * @param $column
//     * @param array $values
//     * @return mixed
//     */
//    public function deleteWhereIn($column, array $values)
//    {
//        return $this->model->whereIn($column, $values)->delete();
//    }
//
//    /**
//     * @param array $where
//     * @param array $columns
//     * @return bool|null
//     * @throws Exception
//     */
//    public function deleteWhere(array $where, $columns = ['*']):?bool
//    {
//        $this->applyConditions($where);
//        return $this->model->delete();
//    }
//
//    /**
//     * @param array $where
//     */
//    public function applyConditions(array $where): void
//    {
//        foreach ($where as $field => $value) {
//            $this->model = $this->model->where($field, '=', $value);
//        }
//    }
}
