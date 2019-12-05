<?php

namespace App\Models\Repositories\Report;

use App\Models\Repositories\BaseRepository;
use \DB;
use Blade;

/**
 * Description of ProductRepository
 *
 * @author PACO
 */
class ReportRepository extends BaseRepository implements ReportRepositoryInterface {

    public $model;

    public function __construct(\Report $cart) {
        $this->model = $cart;
        parent::__construct();
    }

    /**
     * List of all available reports
     * @return type
     */
    public function getReports() {
        return $this->model->all()->toArray();
    }
    
    /**
     * Get report configuration
     * @param type $id
     * @return type
     */
    public function getReport($id) {
        return $this->model->find($id);
    }
    
    /**
     * Get report filters
     * @param type $filter_form
     * @return boolean
     */
    public function getReportFilters($filter_form) {
        $elements = \Forms::with('elements')
                ->where('form.id', '=', $filter_form)
                ->first();
        
        if($elements)
            return $elements->toArray();
        
        return false;
    }

    public function view($id) {

        return true;
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function show($id) {
        return \Report::with('products')->get()->toArray();
    }
    
    /**
     * Generate report result based on configuration settings
     * @param type $id
     * @param type $data
     * @return type
     */
    public function getReportResult($id, $data) {
        $reportConfig = $this->getReport($id);
        
        return $this->fillTemplate($reportConfig, $data);
    }
    
    /**
     * Fill report template
     * @param type $reportConfig
     * @param type $data
     * @return type
     */
    protected function fillTemplate($reportConfig, $data) {
        $tmpdata = explode("\n", trim($reportConfig['sql']));
        $dataArray = [];

        //try to execute sql config and store it to array with unique key
        foreach ($tmpdata as $tmprow) {
            $row = explode('~=~', $tmprow);
            set_time_limit(0);
            $tmpResult = $this->query(trim($row['1']), $data);

            $dataArray[trim($row['0'])] = $tmpResult;
        }

        //Here is the magic 
        $generated = Blade::compileString($reportConfig['html']);

        ob_start();
        extract($dataArray, EXTR_SKIP);

        // We'll include the view contents for parsing within a catcher
        // so we can avoid any WSOD errors. If an exception occurs we
        // will throw it out to the exception handler.
        try {
            eval('?>' . $generated);
        }

        // If we caught an exception, we'll silently flush the output
        // buffer so that no partially rendered views get thrown out
        // to the client and confuse the user with junk.
        catch (\Exception $e) {
            ob_get_clean();
            return $e->getMessage();
        }

        $content = ob_get_clean();

        return $content;
    }

}
