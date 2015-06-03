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
        DB::table('roles')->delete();


        DB::table('roles')->insert(array(
            array('role_name'=>'Administrador','role_description'=>'Administrador del sistema con privilegios especiales.'),
            array('role_name'=>'Personal Matrícula','role_description'=>'Usuario basico del sistema.')
        ));
    }
}