<?php

class Forms extends Eloquent {

    protected $table = "form";
    
    public function elements()
    {
        return $this->hasMany('Elements', 'id_form', 'id');
    }

}
