<?php

class UserController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('security.users.index');
    }

    public function newOrEdit($name)
    {
        $roles = with(new Role)->GetAllRoles();
        if ($name == "nuevo") {
            $name = null;
        }
        //$userToEdit = with(new User)->GetUserByUsername($name);
        return View::make('security.users.details')->with('name', $name)->with('roles', $roles);
    }

    public function getAllUsers()
    {
        //we get all the users from the database
        //return the list of users in json
        $rawUsers = with(new User)->GetAllUsers();
        return Response::json(array(
            'error' => false,
            'users' =>  json_encode($rawUsers),
        ),
        200
        )->setCallback(Input::get('callback'));
    }

    public function getUserByUsername()
    {
        $username = $_GET['username'];
        $matchingUser = with(new User)->GetUserByUsername($username);

        return Response::json(array(
            'error' => false,
            'user' =>  $matchingUser,
        ), 200
        )->setCallback(Input::get('callback'));
    }

    public function saveUser()
    {
        $rawUser = $_GET['user'];
        $userModel = new User;
        $result = $userModel->SaveUser($rawUser);

        return Response::json(array(
            'result' =>  $result,
        ), 200
        )->setCallback(Input::get('callback'));
    }

    public function deleteUser()
    {
        $userId = $_GET['userId'];
        $result = with(new User)->DeleteUser($userId);

        return Response::json(array(
            'result' =>  $result,
        ), 200
        )->setCallback(Input::get('callback'));
    }
}
