<?php

namespace App\Models\Repositories\ProductGroups;

/**
 * Description of ProductGroupsRepositoryInterface
 *
 * @author PACO
 */
interface ProductGroupsRepositoryInterface {

    public function products();

    public function getProductGroups();

    public function getProductGroup($id);

    public function store($data);

    public function deleteProductGroup($id);
}
