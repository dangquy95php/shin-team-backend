<?php

namespace ShinTeam\Repository;

use ShinTeam\Interfaces\interfaceRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class AbstractEloquentRepository implements interfaceRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;
    protected $pagination;

    /**
     * AbstractEloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = array('*'))
    {
        return $this->_model->all($columns);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->_model->paginate($limit, $columns);
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $columns = '*')
    {
        $result = $this->_model->findOrFail($id, $columns);

        return $result;
    }

    public function save()
    {
        $result = $this->_model->save();

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->_model->find($id);
        if ($result) {
            $result->update($attributes);
            
            return $result;
        }

        throw new ModelNotFoundException("Can't found by ID ". $id);
    }

    public function pagination($offset = 0, $limit = 10)
    {
        return $this->_model->offset($offset)->limit($limit)->get();
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->_model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        throw new ModelNotFoundException("Can't found by ID ". $id);
    }

    /**
     * Count model
     *
     * @param $id
     * @return bool
     */
    public function count()
    {
        return $this->_model->count();
    }
}