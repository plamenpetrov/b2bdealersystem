<?php

namespace App\Models\Repositories\ProductGroups;

use App\Models\Repositories\BaseRepository;

/**
 * Description of ProductGroupsRepository
 *
 * @author PACO
 */
class ProductGroupsRepository extends BaseRepository implements ProductGroupsRepositoryInterface {
    public $model;
    
    public function __construct(\ProductGroups $productGroups) {
        $this->model = $productGroups;
        parent::__construct();
    }
    
    /**
     * Product groups with related products
     * @return type
     */
    public function products() {
        return \ProductGroups::with('products')->get()->toArray();
    }
    
    /**
     * List of all product groups
     * @return type
     */
    public function getProductGroups() {
        return $this->model->all()->toArray();
    }

    /**
     * Get data for specific product group
     * @param type $id
     * @return type
     */
    public function getProductGroup($id) {
        return $this->model->where('id', '=', $id)->first()->toArray();
    }

    /**
     * Create or update product group
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
     * Delete product group
     * @param type $id
     * @return type
     */
    public function deleteProductGroup($id) {
        return $this->model->where('id', '=', $id)->delete();
    }
}
