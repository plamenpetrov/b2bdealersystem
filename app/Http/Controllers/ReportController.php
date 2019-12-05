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

    /**
     * List of all available reports
     * @return type
     */
    public function index() {
        $reports = $this->reportRepo->getReports();

        return View::make('report.index')
                        ->with('reports', $reports);
    }

    /**
     * Show report filters if exists
     * @param type $id
     * @return type
     */
    public function filters($id) {
        $report = $this->reportRepo->getReport($id);

        if ($report->filter_form) {
            $filters = $this->reportRepo->getReportFilters($report->filter_form);
            
            return View::make('report.filters')
                        ->with('filters', $filters);
            
        }

        return Redirect::route('report_show');
    }

    /**
     * Display report result. Currently only table preview
     * @param type $id
     * @return type
     */
    public function show($id) {
        $data = \Input::all();
        $reportResult = $this->reportRepo->getReportResult($id, $data);

        return View::make('report.show')
                        ->with('data', $reportResult);
    }

}
