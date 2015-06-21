<?php

use Illuminate\Auth\ProfesorTrait;
use Illuminate\Auth\ProfesorInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Profesor extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Profesor';

    protected $primaryKey = 'prof_id';

    /*
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function GetAllProfesores()
    {
        $profesores = DB::table('Profesor')
            ->join('Usuario', 'Profesor.usr_id', '=', 'Usuario.usr_id')
            ->select('Usuario.usr_username', 'Profesor.prof_id', 'Profesor.prof_dni', 'Profesor.prof_nombre','Profesor.prof_apellido_paterno',
                'Profesor.prof_apellido_materno', 'Profesor.prof_sexo', 'Profesor.prof_sexo', 'Profesor.prof_direccion', 'Profesor.prof_telefono'
                , 'Profesor.prof_fecha_nac', 'Profesor.prof_esTutor', 'Profesor.prof_esTutor_aula', 'Profesor.created_at', 'Profesor.updated_at')
            ->get();

        return $profesores;
    }

    public function GetProfesorByDni($ProfesorDni)
    {
        $matchingProfesor = Profesor::where('prof_dni', '=', $ProfesorDni)->first();

        return $matchingProfesor;
    }

    public function GetProfesorById($id)
    {
        $matchingProfesor = Profesor::where('prof_id','=',$id)->first();

        return $matchingProfesor;
    }

    public function SaveProfesor($rawProfesor)
    {
        $existingProfesor = Profesor::where('prof_id','=', $rawProfesor['id'])->first();
        if (!$existingProfesor){
            $existingProfesor = new Profesor;
        }
        $existingProfesor->prof_dni = $rawProfesor['dni'];
        $existingProfesor->prof_nombre = $rawProfesor['nombre'];
        $existingProfesor->prof_apellido_paterno = $rawProfesor['apePaterno'];
        $existingProfesor->prof_apellido_materno = $rawProfesor['apeMaterno'];
        $existingProfesor->usr_id = $rawProfesor['username'];
        $existingProfesor->prof_sexo = $rawProfesor['sexo'];
        $existingProfesor->prof_direccion = $rawProfesor['direccion'];
        $existingProfesor->prof_telefono = $rawProfesor['telefono'];
        $existingProfesor->prof_esTutor = $rawProfesor['active'];
        $existingProfesor->prof_esTutor_aula = $rawProfesor['tutorAula'];
        $existingProfesor->save();
        return true;
    }

    public function DeleteProfesor($profesorId)
    {
        $deleteProfesor = Profesor::where('prof_id','=',$profesorId)->first();
        if($deleteProfesor){
            $deleteProfesor->delete();
            return true;
        }
        return false;
    }
}
