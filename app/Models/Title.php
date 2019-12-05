<?php

class Title extends Eloquent {

    protected $table = "title";

    /**
     * Define eloquent relation hasOne to Company
     * @return type
     */
    public function company()
    {
        return $this->hasOne('Company', 'id', 'id_company');
    }
}
