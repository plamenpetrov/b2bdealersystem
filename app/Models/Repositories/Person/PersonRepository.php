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

    /**
     * List of all persons
     * @return type
     */
    public function getPersons() {
        return \Person::with('company')
                ->with('position')
                ->get()
                ->toArray();
    }

    /**
     * Get data for specific person
     * @param type $id
     * @return type
     */
    public function getPerson($id) {
        return $this->model->where('id', '=', $id)->first()->toArray();
    }

    /**
     * Create or update person
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
     * Delete person
     * @param type $id
     * @return type
     */
    public function deletePerson($id) {
        return $this->model->where('id', '=', $id)->delete();
    }

}
