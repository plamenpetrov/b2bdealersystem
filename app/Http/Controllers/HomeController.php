<?php

namespace App\Http\Controllers;

use \View;
use \Auth;
use \Input;
use App\Models\Repositories\ProductGroups\ProductGroupsRepositoryInterface as ProductGroupsRepositoryInterface;
use App\Models\Repositories\Cart\CartRepositoryInterface as CartRepositoryInterface;

/**
 * Description of HomeController
 */
class HomeController extends BaseController {

    public $productRepo;
    public $cartRepo;

    public function __construct(ProductGroupsRepositoryInterface $productRepo, CartRepositoryInterface $cartRepo) {
        $this->productRepo = $productRepo;
        $this->cartRepo = $cartRepo;
    }

    public function index() {
        $products = $this->productRepo->products();
        $cartProductsNumber = $this->cartRepo->getCountProducts();

        return View::make('home.home')->with('products', $products)
                        ->with('cartProducts', $cartProductsNumber);
    }

    public function nomenclature() {
        return View::make('home.nomenclature');
    }

    public function orders() {
        return View::make('home.orders');
    }

}
