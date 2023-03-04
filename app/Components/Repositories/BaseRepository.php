<?php

namespace App\Components\Repositories;

use App\Components\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseRepository implements IBaseRepository
{

    public function find(): Builder
    {
        $model = $this->getModel();
        return $model::query();
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function save(Model $model)
    {
        return $model->save();
    }

    /**
     * @param Model $model
     * @return bool|null
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * @param int $id
     * @param array $with
     * @return Builder|Model
     */
    public function oneById(int $id, array $with = [])
    {
        return $this->find()->where(['id' => $id])->with($with)->first();
    }

    /**
     * @param Request $request
     * @param Model $model
     * @return bool
     */
    public function storage(Request $request, Model $model): bool
    {
        return $model->fill($request->validated())->save();
    }

}
