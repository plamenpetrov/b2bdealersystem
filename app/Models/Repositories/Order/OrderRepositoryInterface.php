<?php

namespace App\Models\Repositories\Order;

/**
 * Description of ProductsInterface
 *
 * @author PACO
 */
interface OrderRepositoryInterface {

    public function getOrders();

    public function getTitle($id);

    public function getRows($id);

    public function cancellation($id);
}
