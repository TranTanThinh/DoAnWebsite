<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class, 'productId', 'productID');
    }

    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getProductID() {
        return $this->attributes['productID'];
    }

    public function setProductID($productId) {
        $this->attributes['productID'] = $productId;
    }

    public function getChangeType() {
        return $this->attributes['changeType'];
    }

    public function setChangeType($changeType) {
        $this->attributes['changeType'] = $changeType;
    }

    public function getQuantity() {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity) {
        $this->attributes['quantity'] = $quantity;
    }

    public function getReason() {
        return $this->attributes['quantity'];
    }

    public function setReason($reason) {
        $this->attributes['quantity'] = $reason;
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
