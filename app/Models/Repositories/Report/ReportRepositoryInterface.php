<?php

namespace App\Models\Repositories\Report;

/**
 * Description of ProductsInterface
 *
 * @author PACO
 */
interface ReportRepositoryInterface {

    public function getReports();

    public function view($id);

    public function show($id);
}
