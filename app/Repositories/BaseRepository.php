<?php

namespace App\Repositories;

use App\Repositories\Contracts\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository  implements IBaseRepository
{
    /**
     * model
     *
     * @var mixed
     */
    protected $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function all($request) : Collection
    {
        return $this->model->all();
    }

    /**
     * find information by conditionals
     *
     * @param $id
     * @return model
     */
    public function find($id): Model
    {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with($this->relations);
        }

        return $query->findOrFail($id);
    }


    /**
     * save data
     * @param Model $model
     * @return Model
     */
    public function save(Model $model) : Model
    {
        $model->save();
        return $model;
    }

    /**
     * delete a information
     * @param Model $model
     * @return Model
     */
    public function destroy(Model $model) : Model
    {
        $model->delete();
        return $model;
    }
}
