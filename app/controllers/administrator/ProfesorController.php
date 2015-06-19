<?php
/**
 * Created by PhpStorm.
 * User: cvereau
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
            //$sedeName = null;
            $profesorId = null;
        }
        else{
           // $sedeName = with(new Sede)->GetSedeById($sedeId)->sede_nombre;
        }
        return View::make('administrator.profesores.details')->with('profesorId', $profesorId);
    }
}