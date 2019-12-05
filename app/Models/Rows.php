<?php

class Rows extends Eloquent {

    protected $table = "rows";

    /**
     * Define eloquent relation hasOne to products
     * @return type
     */
    public function products() {
        return $this->hasOne('Products', 'id', 'id_product');
    }
}
