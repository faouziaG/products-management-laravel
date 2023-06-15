<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll($perPage=10, array $filters = [])
    {
        $query = $this->product->newQuery();
        $query->orderBy('id', 'asc');

        if (count($filters)) {
            // Filter by keyword
            if (isset($filters['keyword'])) {
                $keyword = $filters['keyword'];
                $query->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%')
                        ->orWhere('type', 'like', '%' . $keyword . '%');
                });
            }
            // Filter by name
            if (isset($filters['name'])) {
                $query->where('name', 'like', '%' . $filters['name'] . '%');
            }

            // Filter by description
            if (isset($filters['description'])) {
                $query->where('description', 'like', '%' . $filters['description'] . '%');
            }

            // Filter by price (with min and max)
            if (isset($filters['price']['min'])) {
                $query->where('price', '>=', $filters['price']['min']);
            }
            if (isset($filters['price']["max"])) {
                $query->where('price', '<=', $filters['price']['max']);
            }

            // Filter by quantity (with min and max)
            if (isset($filters['quantity']['min'])) {
                $query->where('quantity', '>=', $filters['quantity']['min']);
            }

            if (isset($filters['quantity']['max'])) {
                $query->where('quantity', '<=', $filters['quantity']['max']);
            }

            // Filter by size (with min and max)
            if (isset($filters['size'])) {
                $query->where('size', 'like', '%' . $filters['size'] . '%');
            }
            // Filter by type
            if (isset($filters['type'])) {
                $query->where('type', 'like', '%' . $filters['type'] . '%');
            }
            // Filter by create at
            if (isset($filters['created_at'])) {
                $query->whereBetween('created_at',  [$filters['created_at']['from'] ,$filters['created_at']['to']]);
            }
        }
        return $query->paginate($perPage);
    }

    public function findById($id)
    {
        return $this->product->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->product->create($data);
    }

    public function update(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product)
    {
        return $product->delete();
    }
}
