<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getUId() {
        return $this->attributes['uid'];
    }

    public function setUId($uid) {
        $this->attributes['uid'] = $uid;
    }

    public function getShippingAddressId(){
        return $this->attributes['shippingAddressId'];
    }

    public function setShippingAddressId($shippingAddressId) {
        $this->attributes['shippingAddressId'] = $shippingAddressId;
    }

    public function getStatus(){
        return $this->attributes['status'];
    }

    public function setStatus($status) {
        $this->attributes['status'] = $status;
    }

    public function getTotalPrice() {
        return $this->attributes['totalPrice'];
    }

    public function setTotalPrice($totalPrice) {
        $this->attributes['totalPrice'] = $totalPrice;
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
    public function orderItems()
    {
        return $this->hasMany(Order_Item::class, 'orderId');
    }
}
