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
        $matchingSede = Sede::where('sede_name', '=', $SedeName)->first();

        return $matchingSede;
    }

    public function GetSedeById($id)
    {
        $matchingSede = Sede::where('sede_id','=',$id)->first();

        return $matchingSede;
    }

    public function SaveSede($rawSede)
    {
        $existingSede = Sede::where('sede_id','=', $rawSede['id'])->first();
        if (!$existingSede){
            $existingSede = new Sede;
        }
        $existingSede->name = $rawSede['sede_name'];
        $existingSede->responsible = $rawSede['sede_responsible'];
        $existingSede->location = $rawSede['sede_location'];
        $existingSede->save();
        return true;
    }

    public function DeleteSede($sedeId)
    {
        $deleteSede = Sede::where('sede_id','=',$sedeId)->first();
        if($deleteSede){
            $deleteSede->delete();
            return true;
        }
        return false;
    }

}