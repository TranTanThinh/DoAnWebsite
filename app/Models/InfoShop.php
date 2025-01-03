<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoShop extends Model
{

    public function getShopName(){
        return $this->attributes['shopName'];
    }

    public function setShopName($shopName) {
        $this->attributes['shopName'] = $shopName;
    }

    public function getEmail(){
        return $this->attributes['email'];
    }

    public function setEmail($email) {
        $this->attributes['email'] = $email;
    }

    public function getPhone(){
        return $this->attributes['phone'];
    }

    public function setPhone($phone) {
        $this->attributes['phone'] = $phone;
    }

    public function getAddress(){
        return $this->attributes['address'];
    }
    public function getFacebook(){
        return $this->attributes['facebook'];
    }
    public function setFacebook($facebook) {
        $this->attributes['facebook'] = $facebook;
    }
    public function getInstagram(){
        return $this->attributes['instagram'];
    }
    public function setInstagram($instagram) {
        $this->attributes['instagram'] = $instagram;
    }
    public function getTwitter(){
        return $this->attributes['twitter'];
    }
    public function setTwitter($twitter) {
        $this->attributes['twitter'] = $twitter;
    }
    public function getDescribe(){
        return $this->attributes['describe'];
    }   
    public function setDescribe($describe) {
        $this->attributes['describe'] = $describe;
    }
    public function setAddress($address) {
        $this->attributes['address'] = $address;
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
