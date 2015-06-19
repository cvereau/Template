<?php
/**
 * Created by PhpStorm.
 * User: cvereau
 * Date: 5/17/15
 * Time: 11:15 AM
 */

class RoleTableSeeder extends Seeder{

    public function run()
    {
        DB::table('Rol')->delete();


        DB::table('Rol')->insert(array(
            array('rol_nombre'=>'Administrador','rol_descripcion'=>'Administrador del sistema con privilegios especiales.'),
            array('rol_nombre'=>'Personal Matrícula','rol_descripcion'=>'Usuario basico del sistema, encargado de las matrículas'),
            array('rol_nombre'=>'Profesor','rol_descripcion'=>'Usuario usado por los docentes para el ingreso de notas')
        ));
    }
}