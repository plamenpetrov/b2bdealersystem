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

    public function query($sql, $params = null) {
        $sys_params = [
            ':id_user:' => $this->current_user->id,
        ];

        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $sys_params[':' . $key . ':'] = $value;
            }
        }

        foreach ($sys_params as $param => $value) {
            $sql = preg_replace('\'' . preg_quote($param, '[') . '\'', $value, $sql);
        }

        $result = \DB::select($sql);
        return $result;
    }

}
