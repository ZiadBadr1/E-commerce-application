<?php

namespace App\Service;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreImageAction;
use App\Models\Product;
use App\Models\SubCategory;

class ProductService
{
    public function getAll(): \LaravelIdea\Helper\App\Models\_IH_Product_C|\Illuminate\Pagination\LengthAwarePaginator|array
    {
        return Product::paginate(5);
    }

    public function create(array $attributes) : Product
    {
        if(isset($attributes['image'])){
            $attributes['image'] = (new StoreImageAction())->execute($attributes['image'], 'product');
        }        return Product::create($attributes);
    }

    public function update(array $attributes , Product $product): void
    {
        if(isset($attributes['image'])) {
            $attributes['image'] = (new StoreImageAction())->execute(($attributes['image']), 'product');
            (new DeleteImageAction())->execute($product->image);
        }
        $product->update($attributes);
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }

    public function getSubCategory($id): \Illuminate\Support\Collection
    {
        return SubCategory::where('category_id',$id)->pluck('name','id');
    }

}