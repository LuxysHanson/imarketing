<?php

namespace App\Components\Repositories;

use App\Models\Basket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BasketRepository extends BaseRepository
{

    public function getModel(): Model
    {
        return new Basket();
    }

    public function getList(): Collection
    {
        return $this->getListProducts()
            ->toQuery()
            ->with([
                'product' => function ($q) {
                    $q->with('fields');
                }
            ])->get();
    }

    public function getListProducts(): Collection
    {
        return $this->find()->byUser()->get();
    }

    public function clearCart(): void
    {
        $this->find()->byUser()->delete();
    }

    public function clearCartByIds(Collection $basketIds): void
    {
        $this->find()->whereIn('id', $basketIds)->byUser()->delete();
    }

    public function dataStorage(Request $request, Basket $basket): bool
    {

        if (is_null($basket->id)) {
            $basket->loadData();
        }

        return $this->storage($request, $basket);
    }

}
