<?php

namespace App\Models\Repositories;

/**
 * Description of ProductRepository
 *
 * @author PACO
 */
use \Auth;

class BaseRepository {
    //put your code here
    public $current_user;
    
    public function __construct() {
        $this->current_user = Auth::user();
    }
}
