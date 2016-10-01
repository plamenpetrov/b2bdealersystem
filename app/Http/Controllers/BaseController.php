<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Pagination\LengthAwarePaginator as LengthAwarePaginator;

class BaseController extends Controller {

    public function __construct() {
        
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function paginate($pagination_config, $data, $routeParams) {
        $paginator = new LengthAwarePaginator($data, $pagination_config['total'], $pagination_config['per_page']);
        $currentUri = \URL::route(\Request::route()->getName(), $routeParams);
        $paginator->setPath($currentUri);

        return $paginator;
    }

}
