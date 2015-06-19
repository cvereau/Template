<?php
/**
 * Created by PhpStorm.
 * User: cvereau
 * Date: 19/06/2015
 * Time: 10:30 AM
 */

class AsignaturaController extends BaseController{

    public function index()
    {
        return View::make('administrator.asignaturas.index');
    }

    public function newOrEdit($cursoId)
    {
        if ($cursoId == "nuevo") {

        }
        else{
           // $sedeName = with(new Sede)->GetSedeById($sedeId)->sede_nombre;
        }
        return View::make('administrator.asignaturas.details')->with('cursoId', $cursoId);
    }

}