<?php

namespace App\Http\Controllers;

use \View;
use \Auth;
use \Input;
use \Redirect;

/**
 * Description of AuthController
 * 
 * 
 */
class AuthController extends BaseController {

    /**
     * Return a login form
     * @return type
     */
    public function getLogin() {
        return View::make('login');
    }

    /**
     * Method processing the login request
     * @return type
     */
    public function postLogin() {
        $validator = \Validator::make(Input::all(), array(
                    'username' => 'required',
                    'password' => 'required',
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('login_get')->withErrors($validator)->withInput();
        } else {
            if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password'), 'active' => 1])) {
                return Redirect::route('home')->with(['success' => 'Welcome']);
            }

            return Redirect::route('login_get')->with(['error' => $auth['message']]);
        }
    }

    /**
     * Flush the session, logout the current user and redirect him to the login page
     * @return type
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect::route('login_get');
    }

}
