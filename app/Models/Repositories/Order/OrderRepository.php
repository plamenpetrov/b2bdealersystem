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

    const active = 1;
    const cancelled = 2;
    
    public $title;
    public $rows;

    public function __construct(\Title $title, \Rows $rows) {
        $this->title = $title;
        $this->rows = $rows;
        parent::__construct();
    }

    /**
     * List of all active orders
     * @return type
     */
    public function getOrders() {
        return \Title::with('company')
                ->where('status', '=', self::active)
                ->get()->toArray();
    }

    /**
     * Order title data
     * @param type $id
     * @return type
     */
    public function getTitle($id) {
        return \Title::with('company')
                        ->where('id', '=', $id)
                        ->where('id_user', '=', $this->current_user->id)
                        ->first()
                        ->toArray();
    }

    /**
     * Order rows data
     * @param type $id
     * @return type
     */
    public function getRows($id) {
        return \Rows::with('products')
                        ->where('id_title', '=', $id)
                        ->get()
                        ->toArray();
    }

    /**
     * Cancel order
     * @param type $id
     * @return type
     */
    public function cancellation($id) {
        return $this->title
                        ->where('id_user', '=', $this->current_user->id)
                        ->where('id', '=', $id)
                        ->update(['status' => self::cancelled]);
    }

}
