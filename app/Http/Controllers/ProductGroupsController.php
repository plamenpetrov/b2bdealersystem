<?php

namespace App\Http\Controllers;

use \View;
use \Input;
use \Validator;
use App\Models\Repositories\ProductGroups\ProductGroupsRepositoryInterface as ProductGroupsRepositoryInterface;

/**
 * Description of HomeController
 */
class ProductGroupsController extends BaseController {

    public $productGroupsRepo;

    public function __construct(ProductGroupsRepositoryInterface $productGroupsRepo) {
        $this->productGroupsRepo = $productGroupsRepo;
    }

    public function index() {
        $productGroups = $this->productGroupsRepo->getProductGroups();

        return View::make('productGroups.index')
                        ->with('productGroups', $productGroups);
    }

    public function add() {
        return View::make('productGroups.create-edit')
                        ->with('productGroup', new \ProductGroups());
    }

    public function edit($id) {
        $productGroup = $this->productGroupsRepo->getProductGroup($id);

        return View::make('productGroups.create-edit')
                        ->with('productGroup', $productGroup);
    }

    public function store() {
        $data = \Input::except('_token');

        $validator = Validator::make($data, [
                    'id' => 'integer',
                    'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                             ->with('warning', $validator->errors()->first())
                            ->withInput();
        }

        if ($this->productGroupsRepo->store($data))
            return \Redirect::route('productgroups_index')
                            ->with('success', trans('messages.save-succes'));

        return \Redirect::back()
                        ->withInput();
    }

    public function delete($id) {
        $this->productGroupsRepo->deleteProductGroup($id);

        return \Redirect::back()
                        ->with('success', trans('messages.delete-success'));
    }

}
