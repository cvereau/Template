<?php
/**
 * Created by PhpStorm.
 * User: cvereau
 * Date: 19/06/2015
 * Time: 04:37 PM
 */

class MatriculaController extends BaseController {

    public function index()
    {
        return View::make('administrator.profesores.index');
    }

    public function newOrEdit($profesorId)
    {
        if ($profesorId == "nuevo") {
            //$sedeName = null;
            $profesorId = null;
        }
        else{
           // $sedeName = with(new Sede)->GetSedeById($sedeId)->sede_nombre;
        }
        return View::make('administrator.periodoMatricula.details')->with('profesorId', $profesorId);
    }

    public function getAllProfesores()
    {
        //we get all the users from the database
        //return the list of users in json
        $rawProfesores = with(new Profesor)->GetAllUsers();
        return Response::json(array(
            'error' => false,
            'users' =>  json_encode($rawProfesores),
        ),
            200
        )->setCallback(Input::get('callback'));
    }

    public function getUserByName()
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