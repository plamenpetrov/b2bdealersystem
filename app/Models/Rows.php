<?php

class Rows extends Eloquent {

    protected $table = "rows";

    public function products() {
        return $this->hasOne('Products', 'id', 'id_product');
    }
}
