<?php

namespace App\Models\Repositories\Company;

use App\Models\Repositories\BaseRepository;

/**
 * Description of CompanyRepository
 *
 * @author PACO
 */
class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface {

    public $model;

    public function __construct(\Company $company) {
        $this->model = $company;
        parent::__construct();
    }

    public function getCompanies() {
        return $this->model->all()->toArray();
    }

    public function getCompany($id) {
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
    
    public function deleteCompany($id) {
        return $this->model->where('id', '=', $id)->delete();
    }

}
