<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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

    public function getPaymentStatus() {
        return $this->attributes['paymentStatus'];
    }

    public function setPaymentStatus($payStatus) {
        $this->attributes['paymentStatus'] = $payStatus;
    }

    public function getPaymentMethod() {
        return $this->attributes['paymentMethod'];
    }

    public function setPaymentMethod($payMethod) {
        $this->attributes['paymentMethod'] = $payMethod;
    }

    public function getAmount() {
        return $this->attributes['amount'];
    }

    public function setAmount($amount) {
        return $this->attributes['amount'] = $amount;
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
