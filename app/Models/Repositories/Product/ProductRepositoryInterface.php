<?php

namespace App\Models\Repositories\Product;

/**
 * Description of ProductsInterface
 *
 * @author PACO
 */
interface ProductRepositoryInterface {

    public function products();

    public function getProducts();

    public function getProduct($id);

    public function store($data);

    public function deleteProduct($id);
}
