<?php

namespace App\Http\Controllers;

use \View;
use \Input;
use \Validator;
use App\Models\Repositories\Person\PersonRepositoryInterface as PersonRepositoryInterface;

/**
 * Description of HomeController
 */
class PersonController extends BaseController {

    public $personRepo;

    public function __construct(PersonRepositoryInterface $personRepo) {
        $this->personRepo = $personRepo;
    }

    /**
     * List of persons
     * @return type
     */
    public function index() {
        $persons = $this->personRepo->getPersons();

        return View::make('person.index')
                        ->with('persons', $persons);
    }

    /**
     * Add person form
     * @param \Company $company
     * @param \Positions $positions
     * @return type
     */
    public function add(\Company $company, \Positions $positions) {
        $companies = $company::all()->toarray();
        $positionsAll = $positions::all()->toarray();

        return View::make('person.create-edit')
                        ->with('person', new \Person())
                        ->with('companies', $companies)
                        ->with('positions', $positionsAll);
    }

    /**
     * Edit person form
     * @param type $id
     * @param \Company $company
     * @param \Positions $positions
     * @return type
     */
    public function edit($id, \Company $company, \Positions $positions) {
        $person = $this->personRepo->getPerson($id);
        $companies = $company::all()->toarray();
        $positionsAll = $positions::all()->toarray();

        return View::make('person.create-edit')
                        ->with('person', $person)
                        ->with('companies', $companies)
                        ->with('positions', $positionsAll);
    }

    /**
     * Store person data
     * @return type
     */
    public function store() {
        $data = \Input::except('_token');

        $validator = Validator::make($data, [
                    'id' => 'integer',
                    'name' => 'required|max:255',
                    'id_company' => 'required|integer',
                    'id_position' => 'integer',
                    'phone' => 'between:1,20',
                    'email' => 'email'
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                            ->with('warning', $validator->errors()->first())
                            ->withInput();
        }

        if ($this->personRepo->store($data))
            return \Redirect::route('person_index')
                            ->with('success', trans('messages.save-success'));

        return \Redirect::back()
                        ->withInput();
    }

    /**
     * Delete person
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $this->personRepo->deletePerson($id);

        return \Redirect::back()
                        ->with('success', trans('messages.delete-success'));
    }

}
