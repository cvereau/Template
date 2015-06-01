<?php
/**
 * Created by PhpStorm.
 * Sede: cvereau
 * Date: 01/06/2015
 * Time: 05:15 PM
 */

class Sede extends Eloquent {

    protected $table = 'Sedes';

    public function GetAllSedes()
    {
        //we get all the Sedes from the database
        $Sedes = Sede::all();
        //return the list of roles
        return $Sedes;
    }
    public function GetSedeByName($SedeName)
    {
        $matchingSede = Sede::where('name', '=', $SedeName)->first();

        return $matchingSede;
    }

    public function GetSedeById($id)
    {
        $matchingSede = Sede::where('id','=',$id)->first();

        return $matchingSede;
    }

    public function SaveSede($rawSede)
    {
        $existingSede = Sede::where('id','=', $rawSede['id'])->first();
        if (!$existingSede){
            $existingSede = new Sede;
        }
        $existingSede->name = $rawSede['name'];
        $existingSede->responsible = $rawSede['responsible'];
        $existingSede->location = $rawSede['location'];
        $existingSede->save();
        return true;
    }

    public function DeleteSede($sedeId)
    {
        $deleteSede = Sede::where('id','=',$sedeId)->first();
        if($deleteSede){
            $deleteSede->delete();
            return true;
        }
        return false;
    }

}