<?php

class Cart extends Eloquent {

    protected $table = "cart";

    public function products()
    {
        return $this->hasOne('Products', 'id', 'id_product');
    }
}
