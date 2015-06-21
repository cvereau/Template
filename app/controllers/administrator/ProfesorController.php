<?php
/**
 * Created by PhpStorm.
 * Profesor: cvereau
 * Date: 19/06/2015
 * Time: 04:37 PM
 */

class ProfesorController extends BaseController {

    public function index()
    {
        return View::make('administrator.profesores.index');
    }

    public function newOrEdit($profesorId)
    {
        if ($profesorId == "nuevo") {
            $profesorId = null;
            $profesorNombre = null;
        }
        else{
            $profesor = with(new Profesor)->GetProfesorById($profesorId);
            $profesorNombre = $profesor->prof_nombre;
            $profesorNombre .= " ".$profesor->prof_apellido_paterno;
            $profesorNombre .= " ".$profesor->prof_apellido_materno;
        }
        return View::make('administrator.profesores.details')->with('profesorId', $profesorId)
            ->with('profesorNombre', $profesorNombre);
    }

    public function getAllProfesores()
    {
        //we get all the Profesors from the database
        //return the list of Profesors in json
        $rawProfesores = with(new Profesor)->GetAllProfesores();
        return Response::json(array(
            'error' => false,
            'profesores' =>  json_encode($rawProfesores),
        ),
            200
        )->setCallback(Input::get('callback'));
    }

    public function getProfesorById()
    {
        $profesorId = $_GET['profesorId'];
        $matchingProfesor = with(new Profesor)->GetProfesorById($profesorId);

        return Response::json(array(
            'error' => false,
            'profesor' =>  $matchingProfesor,
        ), 200
        )->setCallback(Input::get('callback'));
    }

    public function saveProfesor()
    {
        $rawProfesor = $_GET['profesor'];
        $ProfesorModel = new Profesor;
        $result = $ProfesorModel->SaveProfesor($rawProfesor);

        return Response::json(array(
            'result' =>  $result,
        ), 200
        )->setCallback(Input::get('callback'));
    }

    public function deleteProfesor()
    {
        $profesorId = $_GET['profesorId'];
        $result = with(new Profesor)->DeleteProfesor($profesorId);

        return Response::json(array(
            'result' =>  $result,
        ), 200
        )->setCallback(Input::get('callback'));
    }
}