<?php

namespace App\Models;
use App\Models\product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'categoryId';
    protected $fillable = ['name', 'slug', 'parent_id'];

    // Quan hệ danh mục cha
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Quan hệ danh mục con
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function getCategoryId() {
        return $this->attributes['categoryId'];
    }
    public function setCategoryId($id) {
        $this->attributes['categoryId'] = $id;
    }

    public function getName() {
        return $this->attributes['name'];
    }

    public function setName($name) {
        $this->attributes['name'] = $name;
    }

    public function getSlug() {
        return $this->attributes['slug'];
    }

    public function setSlug($slug) {
        $this->attributes['slug'] = $slug;
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

    public function getDeletedAt() {
        return $this->attributes['deleted_at'];
    }
    public function setDeteledAt($deletedAt) {
        $this->attributes['deleted_at'] = $deletedAt;
    }
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'categoryId');
    }

    // Phương thức quan hệ với Product
    public function products()
    {
        return $this->hasMany(Product::class, 'categoryId');
    }
}
