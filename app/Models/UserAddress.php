<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getUserID() {
        return $this->attributes['userID'];
    }

    public function setUserID($userID) {
        $this->attributes['userID'] = $userID;
    }

    public function getAddressID() {
        return $this->attributes['addressID'];
    }

    public function setAddressID($addressID) {
        $this->attributes['addressID'] = $addressID;
    }

    public function getIsDefault() {
        return $this->attributes['isDefault'];
    }

    public function setIsDefault($isDefault) {
        $this->attributes['isDefault'] = $isDefault;
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
    public function orders()
    {
        return $this->hasMany(Order::class, 'addressId', 'addressID');
    }
}
