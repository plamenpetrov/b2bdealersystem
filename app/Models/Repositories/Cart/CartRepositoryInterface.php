<?php

namespace App\Models\Repositories\Cart;

/**
 * Description of ProductsInterface
 *
 * @author PACO
 */
interface CartRepositoryInterface {

    public function getCountProducts();

    public function store($data);

    public function getCart();

    public function deleteFromCart($id);

    public function confirm($data);

    public function emptyCart();
}
