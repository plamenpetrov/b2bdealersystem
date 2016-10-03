<?php

namespace App\Http\Controllers;

use \View;
use \Input;
use \Validator;
use \Redirect;
use App\Models\Repositories\Report\ReportRepositoryInterface as ReportRepositoryInterface;

/**
 * Description of HomeController
 */
class ReportController extends BaseController {

    public $reportRepo;

    public function __construct(ReportRepositoryInterface $reportRepo) {
        $this->reportRepo = $reportRepo;
    }

    public function index() {
        $reports = $this->reportRepo->getReports();

        return View::make('report.index')
                        ->with('reports', $reports);
    }

    public function filters($id) {
        $report = $this->reportRepo->getReport($id);

        if ($report->filter_form) {
            $filters = $this->reportRepo->getReportFilters($report->filter_form);
            
            return View::make('report.filters')
                        ->with('filters', $filters);
            
        }

        return Redirect::route('report_show');
    }

    public function show($id) {
        $data = \Input::all();
        $reportResult = $this->reportRepo->getReportResult($id, $data);

        return View::make('report.show')
                        ->with('data', $reportResult);
    }

}
