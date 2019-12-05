<?php

class Cart extends Eloquent {

    protected $table = "cart";

    /**
     * Define eloquent relation hasOne to Products
     * @return type
     */
    public function products()
    {
        return $this->hasOne('Products', 'id', 'id_product');
    }
}
