<?php

class Title extends Eloquent {

    protected $table = "title";

    public function company()
    {
        return $this->hasOne('Company', 'id', 'id_company');
    }
}
