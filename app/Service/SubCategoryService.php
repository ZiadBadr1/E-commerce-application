<?php

namespace App\Service;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreImageAction;
use App\Models\SubCategory;

class SubCategoryService
{

    public function getAll(): array|\Illuminate\Pagination\LengthAwarePaginator|\LaravelIdea\Helper\App\Models\_IH_SubCategory_C
    {
        return SubCategory::paginate(10);
    }

    public function create(array $attributes) : SubCategory
    {
        if(isset($attributes['icon'])) {
            $attributes['icon'] = (new StoreImageAction())->execute($attributes['icon'], 'SubCategory') ?? "";
        }
        return SubCategory::create($attributes);
    }

    public function update(array $attributes , SubCategory $SubCategory): void
    {
        if(isset($attributes['icon'])) {
            $attributes['icon'] = (new StoreImageAction())->execute(($attributes['icon']), 'SubCategory');
            (new DeleteImageAction())->execute($SubCategory->icon);
        }
        $SubCategory->update($attributes);
    }

    public function delete(SubCategory $SubCategory): void
    {
        $SubCategory->delete();
    }

}