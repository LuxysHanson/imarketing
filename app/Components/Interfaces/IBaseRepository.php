<?php

namespace App\Components\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{

    public function getModel(): Model;
    public function find(): Builder;
    public function save(Model $model);
    public function delete(Model $model);
}
