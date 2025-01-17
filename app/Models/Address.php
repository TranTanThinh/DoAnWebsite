<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function userAddresses() {
        return $this->hasMany(UserAddress::class, 'addressID');
    }
    public function getId() {
        return $this->attributes['id'];
    }
    public function setId($id) {
        $this->attributes['id'] = $id;
    }
    public function getStreet() {
        return $this->attributes['street'];
    }
    public function setStreet($street) {
        $this->attributes['street'] = $street;
    }
    public function getWard() {
        return $this->attributes['ward'];
    }
    public function setWard($ward) {
        $this->attributes['ward'] = $ward;
    }
    public function getDistrict() {
        return $this->attributes['district'];
    }
    public function setDistrict($district) {
        $this->attributes['district'] = $district;
    }
    public function getProvince() {
        return $this->attributes['province'];
    }
    public function setProvince($province) {
        $this->attributes['province'] = $province;
    }
    public function getCountry() {
        return $this->attributes['country'];
    }
    public function setCountry($country) {
        $this->attributes['country'] = $country;
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
