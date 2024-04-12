<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'description', 'image', 'price', 'quantity', 'category_id', 'sub_category_id'];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory():BelongsTo
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

}
