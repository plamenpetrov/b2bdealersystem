<?php

namespace App\Models\Repositories\Company;

/**
 * Description of CompanyRepositoryInterface
 *
 * @author PACO
 */
interface CompanyRepositoryInterface {

    public function getCompanies();

    public function getCompany($id);

    public function store($data);

    public function deleteCompany($id);
}
