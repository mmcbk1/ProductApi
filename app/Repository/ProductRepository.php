<?php

namespace App\Repository;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository
{
    protected function getModel(): Model
    {
        return new Product();
    }

    public function findByAmountGraterThen(int $amount, int $limit = 30)
    {
        return $this->model
            ->select(['id', 'name', 'amount'])
            ->where('amount', '>', $amount)
            ->paginate($limit);
    }

    public function findByAmount(int $amount, int $limit = 30)
    {
        return $this->model
            ->select(['id', 'name', 'amount'])
            ->where('amount', '=', $amount)
            ->paginate($limit);
    }
}