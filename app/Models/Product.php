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
     // Nếu khóa chính của bạn là productId thay vì id, bạn cần khai báo như sau:
     protected $primaryKey = 'productId';  // Đặt khóa chính đúng

     // Nếu bạn không muốn sử dụng timestamps (created_at, updated_at)
     // bạn có thể tắt timestamps:
     public $timestamps = true;  // Thực tế là mặc định, nếu bạn không muốn timestamp thì đặt false
     
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'slug',
        
    ];


    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getName() {
        return $this->attributes['name'];
    }

    public function setName($name) {
        $this->attributes['name'] = $name;
    }

    public function getImage() {
        return $this->attributes['image'];
    }

    public function setImage($image) {
        $this->attributes['image'] = $image;
    }

    public function getDescription() {
        return $this->attributes['description'];
    }

    public function setDescription($description) {
        $this->attributes['description'] = $description;
    }

    public function getPrice() {
        return $this->attributes['price'];
    }

    public function setPrice($price) {
        $this->attributes['price'] = $price;
    }

    public function getSlug() {
        return $this->attributes['slug'];
    }

    public function setSlug($slug) {
        $this->attributes['slug'] = $slug;
    }

    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt) {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt) {
        $this->attributes['updated_at'] = $updatedAt;
    }
}