<?php

use App\Models\Products;

class ProductGroups extends Eloquent {

    protected $table = "product_groups";

    /**
     * Define eloquent relation hasMany to Products
     * @return type
     */
    public function products()
    {
        return $this->hasMany('Products', 'id_product_groups', 'id');
    }
    
}
