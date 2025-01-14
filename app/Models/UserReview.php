<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{

    protected $fillable = [
        'userID',
        'orderedProductID',
        'rating',
        'comment',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

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


    public function getOrderedProductID() {
        return $this->attributes['orderedProductID'];
    }

    public function setOrderedProductID($orderedProductID) {
        $this->attributes['orderedProductID'] = $orderedProductID;
    }

    public function getRating() {
        return $this->attributes['rating'];
    }

    public function setRating($rating) {
        $this->attributes['rating'] = $rating;
    }

    public function getComment() {
        return $this->attributes['comment'];
    }

    public function setComment($comment) {
        $this->attributes['comment'] = $comment;
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
