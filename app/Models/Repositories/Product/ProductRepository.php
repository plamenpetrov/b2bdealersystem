<?php

namespace App\Models\Repositories\Product;

use App\Models\Repositories\BaseRepository;

/**
 * Description of ProductRepository
 *
 * @author PACO
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface {
    public $model;
    
    public function __construct(\Products $products) {
        $this->model = $products;
        parent::__construct();
    }
    
    /**
     * Products with related product groups
     * @return type
     */
    public function products() {
        return \Products::with('productgroups')->get()->toArray();
    }
    
    /**
     * TO DO:
     * @return type
     */
    public function getProducts() {
        return \Product::with('company')
                ->with('position')
                ->get()
                ->toArray();
    }

    /**
     * Get product data
     * @param type $id
     * @return type
     */
    public function getProduct($id) {
        return $this->model->where('id', '=', $id)->first()->toArray();
    }

    /**
     * Create or update product
     * @param type $data
     * @return type
     */
    public function store($data) {
        $id = $data['id'];
        unset($data['id']);

        if ($id) {
            return $this->model->where('id', '=', $id)
                            ->update($data);
        } else {
            return $this->model->insert($data);
        }
    }

    /**
     * Delete product by id
     * @param type $id
     * @return type
     */
    public function deleteProduct($id) {
        return $this->model->where('id', '=', $id)->delete();
    }
}
