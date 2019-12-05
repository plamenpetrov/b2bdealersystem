<?php

class Products extends Eloquent {

    protected $table = "products";

    /**
     * Define eloquent relation belongsTo to ProductGroups
     * @return type
     */
    public function productgroups() {
        return $this->belongsTo('ProductGroups', 'id_product_groups', 'id');
    }
}
