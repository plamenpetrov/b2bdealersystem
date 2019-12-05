<?php

class Forms extends Eloquent {

    protected $table = "form";

    /**
     * Define eloquent relation hasMany to Elements
     * @return type
     */
    public function elements() {
        return $this->hasMany('Elements', 'id_form', 'id');
    }

}
