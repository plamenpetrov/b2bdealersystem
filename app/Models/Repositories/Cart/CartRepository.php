<?php

namespace App\Models\Repositories\Cart;

use App\Models\Repositories\BaseRepository;
use \DB;

/**
 * Description of ProductRepository
 *
 * @author PACO
 */
class CartRepository extends BaseRepository implements CartRepositoryInterface {

    public $model;

    public function __construct(\Cart $cart) {
        $this->model = $cart;
        parent::__construct();
    }

    public function getCountProducts() {
        return $this->model->where('id_user', '=', $this->current_user->id)->count();
    }

    public function store($data) {
        if (!$data)
            return false;

        foreach ($data as $key => $values) {
            $values['id_user'] = $this->current_user->id;
            $this->model->insert($values);
        }

        return true;
    }

    public function getCart() {
        return \Cart::with('products')->get()->toArray();
    }

    public function deleteFromCart($id) {
        return $this->model->where('id', '=', $id)
                        ->where('id_user', '=', $this->current_user->id)
                        ->delete();
    }

    public function confirm($data) {
        DB::beginTransaction();

        try {
            $carRows = $this->model->where('id_user', '=', $this->current_user->id)->get();
            $maxDocNum = \Title::max('docnum') + 1;
            $docNum = $maxDocNum ? $maxDocNum : 1;

            $idTitle = \Title::insertGetId(
                            [
                                'id_company' => $data['id_company'],
                                'date' => date('Y-m-d'),
                                'docnum' => $docNum,
                                'id_user' => $this->current_user->id,
                                'status' => 1
            ]);

            $inserts = [];

            foreach ($carRows as $row) {
                $inserts[] = [
                    'id_title' => $idTitle,
                    'quantity' => $row->quantity,
                    'id_product' => $row->id_product,
                    'price' => $row->price
                ];
            }

            \Rows::insert($inserts);
            $this->emptyCart();

            DB::commit();
            return $idTitle;
        } catch (Exception $ex) {
            DB::rollback();
            \Log::info($ex->getMessage());
            return false;
        }
    }

    public function emptyCart() {
        return $this->model
                        ->where('id_user', '=', $this->current_user->id)
                        ->delete();
    }

}
