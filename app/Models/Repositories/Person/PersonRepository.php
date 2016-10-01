<?php

namespace App\Models\Repositories\Person;

use App\Models\Repositories\BaseRepository;

/**
 * Description of PersonRepository
 *
 * @author PACO
 */
class PersonRepository extends BaseRepository implements PersonRepositoryInterface {

    public $model;

    public function __construct(\Person $company) {
        $this->model = $company;
        parent::__construct();
    }

    public function getPersons() {
        return \Person::with('company')
                ->with('position')
                ->get()
                ->toArray();
    }

    public function getPerson($id) {
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

    public function deletePerson($id) {
        return $this->model->where('id', '=', $id)->delete();
    }

}
