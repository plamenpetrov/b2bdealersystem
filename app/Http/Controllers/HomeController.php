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

    public $productGroupsRepo;
    public $cartRepo;

    public function __construct(ProductGroupsRepositoryInterface $productGroupsRepo, CartRepositoryInterface $cartRepo) {
        $this->productGroupsRepo = $productGroupsRepo;
        $this->cartRepo = $cartRepo;
    }

    /**
     * Return list of products that need to be added
     * @return type
     */
    public function index() {
        $products = $this->productGroupsRepo->products();
        $cartProductsNumber = $this->cartRepo->getCountProducts();

        return View::make('home.home')->with('products', $products)
                        ->with('cartProducts', $cartProductsNumber);
    }

    /**
     * List of all nomenclatures
     * @param \Company $companyRepo
     * @param \Person $personRepo
     * @param \Products $productRepo
     * @return type
     */
    public function nomenclature(\Company $companyRepo, \Person $personRepo, \Products $productRepo) {

        return View::make('home.nomenclature')
                ->with('companies', $companyRepo->count())
                ->with('persons', $personRepo->count())
                ->with('products', $productRepo->count())
                ->with('productGroups', $this->productGroupsRepo->model->count());
        
    }

}
