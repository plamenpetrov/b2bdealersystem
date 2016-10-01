<?php

class Person extends Eloquent {

    protected $table = "person";

    public function company() {
        return $this->belongsTo('Company', 'id_company', 'id');
    }

    public function position()
    {
        return $this->hasOne('Positions', 'id', 'id_position');
    }
}
