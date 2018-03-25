<?php


namespace App\Repositories\Eloquent;

use Exception;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container;

abstract class Repository implements RepositoryInterface
{
    const MAX_ITEM_PER_PAGE = 100;
    const DEFAULT_ITEM_PER_PAGE = 10;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Container $container
     * @throws Exception
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->makeModel();
    }

    public function getModelClass()
    {
        return get_class($this->model);
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->model->limit(self::MAX_ITEM_PER_PAGE)->get($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = self::DEFAULT_ITEM_PER_PAGE, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function find(
        $id,
        $columns = array('*'),
        $limit = self::MAX_ITEM_PER_PAGE,
        $offset = 0
    ) {
        return $this->model->limit($limit)->offset($offset)->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @return Model
     * @throws Exception
     */
    public function makeModel()
    {
        $model = $this->container->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
}