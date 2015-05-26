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
            array('name'=>'administrador','description'=>'Administrador del sistema con privilegios especiales.'),
            array('name'=>'usuario','description'=>'Usuario basico del sistema.')
        ));
    }
}