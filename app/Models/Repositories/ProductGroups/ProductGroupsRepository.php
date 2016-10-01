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
    
    public function products() {
        return \ProductGroups::with('products')->get()->toArray();
    }
    
    public function getProductGroups() {
        return $this->model->all()->toArray();
    }

    public function getProductGroup($id) {
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

    public function deleteProductGroup($id) {
        return $this->model->where('id', '=', $id)->delete();
    }
}
