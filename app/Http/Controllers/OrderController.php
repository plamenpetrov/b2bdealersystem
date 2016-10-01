<?php

namespace App\Http\Controllers;

use \View;
use \Auth;
use \Input;
use App\Models\Repositories\Order\OrderRepositoryInterface as OrderRepositoryInterface;

/**
 * Description of HomeController
 */
class OrderController extends BaseController {

    public $ordersRepo;
    public $cartRepo;

    public function __construct(OrderRepositoryInterface $ordersRepo) {
        $this->ordersRepo = $ordersRepo;
    }

    public function index() {
        $orders = $this->ordersRepo->getOrders();

        return View::make('order.index')
                        ->with('orders', $orders);
    }

    public function show($id) {
        $titleData = $this->ordersRepo->getTitle($id);
        $rowData = $this->ordersRepo->getRows($id);

        return View::make('order.show')
                        ->with('titleData', $titleData)
                        ->with('rowData', $rowData);
    }

    public function cancellation($id) {
        $this->ordersRepo->cancellation($id);

        return \Redirect::back()
                        ->with('success', 'Cancellation success');
    }

}
