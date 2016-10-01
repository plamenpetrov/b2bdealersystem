<?php

namespace App\Models\Repositories\Order;

use App\Models\Repositories\BaseRepository;
use \DB;

/**
 * Description of ProductRepository
 *
 * @author PACO
 */
class OrderRepository extends BaseRepository implements OrderRepositoryInterface {

    public $title;
    public $rows;

    public function __construct(\Title $title, \Rows $rows) {
        $this->title = $title;
        $this->rows = $rows;
        parent::__construct();
    }

    public function getOrders() {
        return \Title::with('company')
                ->where('status', '=', 1)
                ->get()->toArray();
    }

    public function getTitle($id) {
        return \Title::with('company')
                        ->where('id', '=', $id)
                        ->where('id_user', '=', $this->current_user->id)
                        ->first()
                        ->toArray();
    }

    public function getRows($id) {
        return \Rows::with('products')
                        ->where('id_title', '=', $id)
                        ->get()
                        ->toArray();
    }

    public function cancellation($id) {
        return $this->title
                        ->where('id_user', '=', $this->current_user->id)
                        ->where('id', '=', $id)
                        ->update(['status' => 2]);
    }

}
