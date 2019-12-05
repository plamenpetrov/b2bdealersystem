<?php

namespace App\Http\Controllers;

use \View;
use \Input;
use \Validator;
use App\Models\Repositories\Product\ProductRepositoryInterface as ProductRepositoryInterface;

/**
 * Description of HomeController
 */
class ProductController extends BaseController {

    public $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo) {
        $this->productRepo = $productRepo;
    }

    /**
     * List of all available products
     * @return type
     */
    public function index() {
        $products = $this->productRepo->products();

        return View::make('product.index')
                        ->with('products', $products);
    }

    /**
     * Create new product form
     * @param \ProductGroups $productGroups
     * @return type
     */
    public function add(\ProductGroups $productGroups) {
        $productGroupsAll = $productGroups::all()->toarray();

        return View::make('product.create-edit')
                        ->with('product', new \Products())
                        ->with('productGroups', $productGroupsAll);
    }

    /**
     * Edit product form
     * @param type $id
     * @param \ProductGroups $productGroups
     * @return type
     */
    public function edit($id, \ProductGroups $productGroups) {
        $product = $this->productRepo->getProduct($id);
        $productGroupsAll = $productGroups::all()->toarray();

        return View::make('product.create-edit')
                        ->with('product', $product)
                        ->with('productGroups', $productGroupsAll);
    }

    /**
     * Store product data
     * @return type
     */
    public function store() {
        $data = \Input::except('_token');

        $validator = Validator::make($data, [
                    'id' => 'integer',
                    'name' => 'required|max:255',
                    'id_product_groups' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                            ->with('warning', $validator->errors()->first())
                            ->withInput();
        }

        if ($this->productRepo->store($data))
            return \Redirect::route('product_index')
                            ->with('success', trans('messages.save-success'));

        return \Redirect::back()
                        ->withInput();
    }

    /**
     * Delete product
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $this->productRepo->deleteProduct($id);

        return \Redirect::back()
                        ->with('success', trans('messages.delete-success'));
    }

}
