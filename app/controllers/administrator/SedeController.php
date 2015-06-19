<?php
/**
 * Created by PhpStorm.
 * User: cvereau
 * Date: 01/06/2015
 * Time: 05:08 PM
 */

class SedeController extends BaseController {

    public function index()
    {
        return View::make('administrator.sedes.index');
    }

    public function newOrEdit($sedeId)
    {
        if ($sedeId == "nuevo") {
            $sedeName = null;
            $sedeId = null;
        }
        else{
            $sedeName = with(new Sede)->GetSedeById($sedeId)->sede_nombre;
        }
        return View::make('administrator.sedes.details')->with('sedeId', $sedeId)->with('sedeName', $sedeName);
    }

    public function getAllSedes()
    {
        //return the list of users in json
        $rawSedes = with(new Sede)->GetAllSedes();
        return Response::json(array(
            'error' => false,
            'sedes' =>  json_encode($rawSedes),
        ),
            200
        )->setCallback(Input::get('callback'));
    }

    public function getSedeByName()
    {
        $sedename = $_GET['sedeName'];
        $matchingSede = with(new Sede)->GetSedeByName($sedename);

        return Response::json(array(
            'error' => false,
            'sede' =>  $matchingSede,
        ), 200
        )->setCallback(Input::get('callback'));
    }

    public function getSedeById()
    {
        $sedeId = $_GET['sedeId'];
        $matchingSede = with(new Sede)->GetSedeById($sedeId);

        return Response::json(array(
            'error' => false,
            'sede' =>  $matchingSede,
        ), 200
        )->setCallback(Input::get('callback'));
    }

    public function saveSede()
    {
        $rawSede = $_GET['sede'];
        $sedeModel = new Sede;
        $result = $sedeModel->SaveSede($rawSede);

        return Response::json(array(
            'result' =>  $result,
        ), 200
        )->setCallback(Input::get('callback'));
    }

    public function deleteSede()
    {
        $sedeId = $_GET['sedeId'];
        $result = with(new Sede)->DeleteSede($sedeId);

        return Response::json(array(
            'result' =>  $result,
        ), 200
        )->setCallback(Input::get('callback'));
    }

}