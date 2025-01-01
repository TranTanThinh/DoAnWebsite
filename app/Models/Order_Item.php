<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getOrderId() {
        return $this->attributes['orderId'];
    }

    public function setOrderId($orderId) {
        $this->attributes['orderId'] = $orderId;
    }

    public function getProductId() {
        return $this->attributes['productId'];
    }

    public function setProductId($productId) {
        $this->attributes['productId'] = $productId;
    }

    public function getQuantity() {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity) {
        $this->attributes['quantity'] = $quantity;
    }

    public function getPrice() {
        return $this->attributes['price'];
    }

    public function setPrice($price) {
        $this->attributes['price'] = $price;
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
    public function getDeletedAt(){
        return $this->attributes['deleted_at'];
    }

    public function setDeletedAt($deletedAt) {
        $this->attributes['deleted_at'] = $deletedAt;
    }
}
