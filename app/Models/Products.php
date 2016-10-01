<?php

class Products extends Eloquent {

    protected $table = "products";

    public function productgroups() {
        return $this->belongsTo('ProductGroups', 'id_product_groups', 'id');
    }
}
