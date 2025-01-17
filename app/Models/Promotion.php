<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = [
        'name', 'description', 'discountRate', 'startDate', 'endDate', 'isActive'
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

    public function getDescription() {
        return $this->attributes['description'];
    }

    public function setDescription($description) {
        $this->attributes['description'] = $description;
    }

    public function getDiscountRate() {
        return $this->attributes['discountRate'];
    }

    public function setDiscountRate($discountRate) {
        $this->attributes['discountRate'] = $discountRate;
    }

    public function getStartDate(){
        return $this->attributes['startDate'];
    }

    public function setStartDate($startDate) {
        $this->attributes['startDate'] = $startDate;
    }

    public function getEndDate(){
        return $this->attributes['endDate'];
    }

    public function setEndDate($endDate) {
        $this->attributes['endDate'] = $endDate;
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
