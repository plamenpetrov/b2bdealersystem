<?php

use App\Models\Products;

class ProductGroups extends Eloquent {

    protected $table = "product_groups";

    public function products()
    {
        return $this->hasMany('Products', 'id_product_groups', 'id');
    }
    
}
