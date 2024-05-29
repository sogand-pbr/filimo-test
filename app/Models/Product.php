<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;

    public const PERCENT_OFFER_Type = 0;
    public const PRICE_OFFER_Type = 1;

    protected $fillable =[
        'title',
        'id',
        'price',
        'url',
        'category_id',
        'final_price',
        'offer',
        'qty',
        'offer_type',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRelatedProductsAttribute()
    {
        return Product::whereNot('id' , $this->attributes['id'])->where('category_id' , $this->attributes['category_id'])->take(10)->get();
    }


}
