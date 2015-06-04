<?php

class LoginController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('authentication.login');
    }

    public function login()
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        //we call the validation function
        $authUser = with(new User)->ValidateUser($username, $password);
        if($authUser){
            //we store the userId on the session
            Session::put('userId', $authUser->user_id);
            Session::put('username', $authUser->username);
            return Response::json(array(
                'error' => false,
                'result' => true,
                'userId' => $authUser->id),
                200
            )->setCallback(Input::get('callback'));
        }
        else{
            return Response::json(array(
                'error' => true,
                'result' => false),
                200
            )->setCallback(Input::get('callback'));
        }

    }

    public function logout()
    {
        Session::put('userId', null);
        Session::put('username', null);

        return Redirect::to('/');
    }
}