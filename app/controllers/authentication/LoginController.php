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
        $sedes = with(new Sede)->GetAllSedes();
        return View::make('authentication.login')->with('sedes',$sedes);
    }

    public function login()
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $sede = $_GET['sede'];
        //we call the validation function
        $authUser = with(new User)->ValidateUser($username, $password, $sede);
        if($authUser){
            //we store the userId on the session
            Session::put('userId', $authUser->usr_id);
            Session::put('username', $authUser->usr_username);
            return Response::json(array(
                'error' => false,
                'result' => true,
                'userId' => $authUser->usr_id),
                200
            )->setCallback(Input::get('callback'));
        }
        else{
            return Response::json(array(
                'error' => false,
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