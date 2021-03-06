<?php

namespace App\Repository;

use Exception;
use Illuminate\Container\Container as App;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as Eloquent;

abstract class BaseRepository
{
    /** @var Model|Builder|Eloquent $model */
    protected $model;
    protected $app;

    public function __construct()
    {
        $this->app = app(App::class);
        $this->makeModel();
    }

    public function makeModel()
    {
        try {
            $model = $this->app->make($this->model());
        } catch (BindingResolutionException $e) {
            return $e->getMessage();
        }
        $this->model = $model;
        return $this->model;
    }

    abstract public function model();

    public function all()
    {
        return $this->makeModel()->all();
    }

    public function find($id)
    {
        return $this->makeModel()->find($id);
    }

    public function create($input)
    {
        return $this->makeModel()->create($input);
    }

    public function update($id, $input, $att = 'id')
    {
        return $this->makeModel()->where($att, $id)->update($input);
    }

    public function delete($id)
    {
        return $this->makeModel()->destroy($id);
    }

    public function findByFields($fields, $value = null, $att = "=", $columns = ['*'])
    {
        return $this->makeModel()->where($fields, $att, $value)->get($columns);
    }

    public function paginate($num)
    {
        return $this->makeModel()->paginate($num);
    }

    /**
     * @param array $where
     * @return bool|int|null
     * @throws Exception
     */
    public function deleteWhere(array $where)
    {
        $this->applyConditions($where);
        $deleted = $this->model->delete();
        return $deleted;
    }

    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }

    public function findWhereGetFirst(array $where)
    {
        $this->applyConditions($where);
        $model = $this->model->first();
        return $model;
    }

    public function findWhere(array $where, $columns = ['*'])
    {
        $this->applyConditions($where);
        $model = $this->model->get($columns);
        return $model;
    }

    public function firstOrCreate($needle, $input)
    {
        return $this->model->firstOrCreate($needle, $input);
    }
}
