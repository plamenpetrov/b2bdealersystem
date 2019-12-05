<?php

class Person extends Eloquent {

    protected $table = "person";

    /**
     * Define eloquent relation belongsTo to Company
     * @return type
     */
    public function company() {
        return $this->belongsTo('Company', 'id_company', 'id');
    }

    /**
     * Define eloquent relation hasOne to Positions
     * @return type
     */
    public function position()
    {
        return $this->hasOne('Positions', 'id', 'id_position');
    }
}
