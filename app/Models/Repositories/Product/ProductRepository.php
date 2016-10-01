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
    
    public function products() {
        return \Products::with('productgroups')->get()->toArray();
    }
    
    public function getProducts() {
        return \Product::with('company')
                ->with('position')
                ->get()
                ->toArray();
    }

    public function getProduct($id) {
        return $this->model->where('id', '=', $id)->first()->toArray();
    }

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

    public function deleteProduct($id) {
        return $this->model->where('id', '=', $id)->delete();
    }
}
