<?php

namespace App\Http\Controllers;

use \View;
use \Input;
use \Validator;
use App\Models\Repositories\Company\CompanyRepositoryInterface as CompanyRepositoryInterface;

/**
 * Description of HomeController
 */
class CompanyController extends BaseController {

    public $companyRepo;

    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->companyRepo = $companyRepo;
    }

    public function index() {
        $companies = $this->companyRepo->getCompanies();

        return View::make('company.index')
                        ->with('companies', $companies);
    }

    public function add(\City $city, \Country $country) {
        $countries = $country::all()->toarray();
        $cities = $city::all()->toarray();

        return View::make('company.create-edit')
                        ->with('company', new \Company())
                        ->with('countries', $countries)
                        ->with('cities', $cities);
    }

    public function edit($id, \City $city, \Country $country) {
        $company = $this->companyRepo->getCompany($id);
        $countries = $country::all()->toarray();
        $cities = $city::all()->toarray();

        return View::make('company.create-edit')
                        ->with('company', $company)
                        ->with('countries', $countries)
                        ->with('cities', $cities);
    }

    public function store() {
        $data = \Input::except('_token');

        $validator = Validator::make($data, [
                    'id' => 'integer',
                    'name' => 'required|max:255',
                    'address' => 'between:1,255',
                    'EIK' => 'between:1,10',
                    'phone' => 'between:1,20',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                            ->with('warning', $validator->errors()->first())
                            ->withInput();
        }

        if ($this->companyRepo->store($data))
            return \Redirect::route('company_index')
                            ->with('success', trans('messages.save-success'));

        return \Redirect::back()
                        ->withInput()
                        ->withErrors();
    }

    public function delete($id) {
        $this->companyRepo->deleteCompany($id);

        return \Redirect::back()
                        ->with('success', trans('messages.delete-success'));
    }

}
