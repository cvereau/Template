<?php
/**
 * Created by PhpStorm.
 * User: cvereau
 * Date: 19/06/2015
 * Time: 04:37 PM
 */

class IngresoNotasController extends BaseController {

    public function index()
    {
        return View::make('administrator.periodoIngresoNotas.index');
    }

    public function newOrEdit($perIngresoNotasId)
    {
        if ($perIngresoNotasId == "nuevo") {
            //$sedeName = null;
            $perIngresoNotasId = null;
        }
        else{
           // $sedeName = with(new Sede)->GetSedeById($sedeId)->sede_nombre;
        }
        return View::make('administrator.periodoIngresoNotas.details')->with('perIngresoNotasId', $perIngresoNotasId);
    }

    public function getAllPerIngresoNotases()
    {
        //we get all the users from the database
        //return the list of users in json
        $rawPerIngresoNotas = with(new PerIngresoNotas)->GetAllPeriods();
        return Response::json(array(
            'error' => false,
            'users' =>  json_encode($rawPerIngresoNotas),
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