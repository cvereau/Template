<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/05/2015
 * Time: 02:25 PM
 */

class RolController extends BaseController{

    public function index()
    {
        return View::make('security.roles.index');
    }

    public function getAllRoles()
    {
        //we get all the users from the database
        //return the list of users in json
        $rawRoles = with(new Role)->GetAllRoles();
        return Response::json(array(
            'error' => false,
            'roles' =>  json_encode($rawRoles),
        ),
            200
        )->setCallback(Input::get('callback'));
    }

}