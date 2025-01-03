<?php

namespace App\Http\Controllers;
use App\Models\InfoShop;

abstract class InfoShopController
{
    abstract public function getInfo();

    // Một phương thức chung để tìm cửa hàng theo ID
    public function findShopById($id)
    {
        return InfoShop::find($id);
    }
}
