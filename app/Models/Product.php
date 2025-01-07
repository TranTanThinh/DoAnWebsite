<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['iamge'] - string -  contains the product image
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['price'] - float - contains the product price
     * $this->attributes['slug'] - string - contains the product slug
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
    **/
    protected $table = 'products';
    protected $primaryKey = 'productId'; // Đặt khóa chính là productId
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
