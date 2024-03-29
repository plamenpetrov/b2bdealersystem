<?php

namespace App\Http\Controllers;

use \View;
use \Input;
use \Validator;
use \Redirect;
use App\Models\Repositories\Cart\CartRepositoryInterface as CartRepositoryInterface;
use App\Models\Repositories\Company\CompanyRepositoryInterface as CompanyRepositoryInterface;

/**
 * Description of CartController
 */
class CartController extends BaseController {

    public $cartRepo;

    public function __construct(CartRepositoryInterface $cartRepo) {
        $this->cartRepo = $cartRepo;
    }

    /**
     * Cart preview
     * @param CompanyRepositoryInterface $company
     * @return type
     */
    public function index(CompanyRepositoryInterface $company) {
        $cart = $this->cartRepo->getCart();
        $cartProductsNumber = $this->cartRepo->getCountProducts();
        $companies = $company->getCompanies();

        $quantityTotal = $this->cartRepo->getCountQuantity();

        return View::make('cart.index')->with('cart', $cart)
                        ->with('cartProducts', $cartProductsNumber)
                        ->with('quantityTotal', $quantityTotal)
                        ->with('companies', $companies);
    }

    /**
     * Add products to cart
     * @return type
     */
    public function store() {
        $data = Input::all();

        $validator = Validator::make(['data' => $data], [
                    'data.*.quantity' => 'required|integer',
                    'data.*.id_product' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        $this->cartRepo->store($data);

        return ['number' => $this->cartRepo->getCountProducts()];
    }

    /**
     * Remove product from cart
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $this->cartRepo->deleteFromCart($id);

        return Redirect::back()
                        ->with('success', trans('messages.delete-success'));
    }

    /**
     * Delete all products from cart
     * @return type
     */
    public function emptyCart() {
        $this->cartRepo->emptyCart();

        return Redirect::back()
                        ->with('success', trans('messages.empty-cart-success'));
    }

    /**
     * Confirm card and create new order
     * @return type
     */
    public function confirm() {
        $data = Input::except('_token');

        $validator = Validator::make($data, [
                    'id_company' => 'required|integer|exists:company,id'
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                            ->with('warning', $validator->errors()->first());
        }

        if ($this->cartRepo->confirm($data))
            return Redirect::route('home')
                            ->with('success', trans('messages.confirm-succes'));

        return Redirect::back()
                        ->withInput();
    }

}
