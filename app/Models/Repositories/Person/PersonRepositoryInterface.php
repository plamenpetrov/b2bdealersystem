<?php

namespace App\Models\Repositories\Person;

/**
 * Description of PersonRepositoryInterface
 *
 * @author PACO
 */
interface PersonRepositoryInterface {

    public function getPersons();

    public function getPerson($id);

    public function store($data);

    public function deletePerson($id);
}
