<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getProductID() {
        return $this->attributes['productID'];
    }

    public function setProductID($productID) {
        $this->attributes['productID'] = $productID;
    }

    public function getPromotionID() {
        return $this->attributes['promotionID'];
    }

    public function setPromotionID($promotionID) {
        $this->attributes['promotionID'] = $promotionID;
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
